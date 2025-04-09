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

module "gke_cluster" {
  source        = "./modules/gke-cluster"
  project_id    = var.project_id
  region        = var.region
  zone          = var.zone
  cluster_name  = var.cluster_name
  initial_nodes = var.initial_nodes
  machine_type  = var.machine_type
}

provider "kubernetes" {
  host                   = module.gke_cluster.kubernetes_host
  token                  = module.gke_cluster.kubernetes_token
  cluster_ca_certificate = module.gke_cluster.kubernetes_ca_certificate
}

resource "google_service_account" "gke_sa" {
  account_id   = "ftrick-gke-sa"
  display_name = "GKE Service Account"
}

resource "google_project_iam_member" "gke_roles" {
  project = var.project_id
  role    = "roles/container.admin"
  member  = "serviceAccount:${google_service_account.gke_sa.email}"
}

provider "helm" {
  kubernetes {
    host                   = module.gke_cluster.kubernetes_host
    token                  = module.gke_cluster.kubernetes_token
    cluster_ca_certificate = module.gke_cluster.kubernetes_ca_certificate
  }
}

# Solo un método para instalar ArgoCD, con todas las optimizaciones
resource "helm_release" "argocd" {
  name             = "argocd-nuevo"  # nuevo nombre para evitar conflicto
  repository       = "https://argoproj.github.io/argo-helm"
  chart            = "argo-cd"
  namespace        = "argocd"
  create_namespace = true
  timeout          = 900
  
  # Configuración para versión ligera
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
  
  # Deshabilitar componentes opcionales
  set {
    name  = "dex.enabled"
    value = "false"
  }
  
  set {
    name  = "notifications.enabled"
    value = "false"
  }
  
  # Recursos mínimos
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
  
  # Añade esta configuración para acceder a la UI
  set {
    name  = "server.service.type"
    value = "LoadBalancer"
  }
}

module "cloud_sql" {
  source              = "./modules/cloud-sql"
  instance_name       = var.instance_name
  region              = var.region
  tier                = var.tier              # Puedes declarar esta variable en el root si lo prefieres, o dejarla literal en el módulo
  high_availability   = var.high_availability
  vpc_network_id      = "https://www.googleapis.com/compute/v1/projects/ftrick-455901/global/networks/default"
  deletion_protection = var.deletion_protection

  db_name             = var.db_name
  db_user             = var.db_user
  db_password         = var.db_password
}


# Comentado temporalmente hasta que ArgoCD esté funcionando
# module "helm_deploy" {
#   source        = "./modules/helm-deploy"
#   release_name  = var.app_release_name
#   chart_name    = "ingress-nginx"
#   chart_repo    = "https://kubernetes.github.io/ingress-nginx"
#   chart_version = "4.10.0"
#   namespace     = var.helm_namespace
#   values        = var.helm_values
#   depends_on    = [module.gke_cluster]
# }
