terraform {
  required_version = ">= 1.0"
  required_providers {
    google = {
      source  = "hashicorp/google"
      version = "~> 5.0"
    }
    kubernetes = {
      source  = "hashicorp/kubernetes"
      version = "~> 2.0"
    }
    helm = {
      source  = "hashicorp/helm"
      version = "~> 2.0"
    }
  }

  backend "gcs" {
    bucket = "my-tfstate-bucket"
    prefix = "terraform/state"
  }
}

provider "google" {
  project = var.project_id
  region  = var.region
  zone    = var.zone
}

data "google_client_config" "default" {}

# 🚀 GKE Cluster Module
module "gke_cluster" {
  source        = "./modules/gke-cluster"
  project_id    = var.project_id
  region        = var.region
  zone          = var.zone
  cluster_name  = var.cluster_name
  initial_nodes = var.initial_nodes
  machine_type  = var.machine_type
}

# ✅ Kubernetes Provider (sin depends_on)
provider "kubernetes" {
  host                   = module.gke_cluster.kubernetes_host
  token                  = module.gke_cluster.kubernetes_token
  cluster_ca_certificate = module.gke_cluster.kubernetes_ca_certificate
}

# ✅ Helm Provider (también sin depends_on)
provider "helm" {
  kubernetes {
    host                   = module.gke_cluster.kubernetes_host
    token                  = module.gke_cluster.kubernetes_token
    cluster_ca_certificate = module.gke_cluster.kubernetes_ca_certificate
  }
}

# ✅ Service Account para nodos
resource "google_service_account" "gke_sa" {
  account_id   = "ftrick-gke-sa"
  display_name = "GKE Service Account"
}

resource "google_project_iam_member" "gke_roles" {
  project = var.project_id
  role    = "roles/container.admin"
  member  = "serviceAccount:${google_service_account.gke_sa.email}"
}

# ✅ Dummy resource para forzar orden (trick 👇)
resource "null_resource" "wait_for_cluster" {
  depends_on = [module.gke_cluster]
}

# ✅ Argo CD
resource "helm_release" "argocd" {
  depends_on = [null_resource.wait_for_cluster]  # ⬅️ truquito clave

  name             = "argocd-nuevo"
  repository       = "https://argoproj.github.io/argo-helm"
  chart            = "argo-cd"
  namespace        = "argocd"
  create_namespace = true
  timeout          = 900

  set {
    name  = "controller.replicas"
    value = "1"
  }

  set {
    name  = "server.replicas"
    value = "1"
  }

  set {
    name  = "repoServer.replicas"
    value = "1"
  }

  set {
    name  = "dex.enabled"
    value = "false"
  }

  set {
    name  = "notifications.enabled"
    value = "false"
  }

  set {
    name  = "redis.resources.requests.memory"
    value = "64Mi"
  }

  set {
    name  = "redis.resources.requests.cpu"
    value = "50m"
  }

  set {
    name  = "redis.resources.limits.memory"
    value = "128Mi"
  }

  set {
    name  = "controller.resources.requests.memory"
    value = "64Mi"
  }

  set {
    name  = "server.resources.requests.memory"
    value = "64Mi"
  }

  set {
    name  = "repoServer.resources.requests.memory"
    value = "64Mi"
  }

  set {
    name  = "server.service.type"
    value = "LoadBalancer"
  }
}

# ✅ Cloud SQL
module "cloud_sql" {
  source              = "./modules/cloud-sql"
  instance_name       = var.instance_name
  region              = var.region
  tier                = var.tier
  high_availability   = var.high_availability
  vpc_network_id      = "https://www.googleapis.com/compute/v1/projects/ftrick-455901/global/networks/default"
  deletion_protection = var.deletion_protection

  db_name     = var.db_name
  db_user     = var.db_user
  db_password = var.db_password
}
