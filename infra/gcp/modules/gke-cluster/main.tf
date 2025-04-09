resource "google_container_cluster" "primary" {
  name               = var.cluster_name
  location           = var.zone  # Usar zona en lugar de región para reducir costos
  deletion_protection = false    # Permite eliminar el cluster fácilmente en pruebas

  remove_default_node_pool = true
  initial_node_count       = 1

  master_auth {
    client_certificate_config {
      issue_client_certificate = false
    }
  }
}

resource "google_container_node_pool" "primary_nodes" {
  name       = "${var.cluster_name}-node-pool"
  cluster    = google_container_cluster.primary.name
  location   = var.zone
  node_count = var.initial_nodes

  node_config {
    preemptible     = true    # Reduce costos
    machine_type    = var.machine_type
    disk_size_gb    = 10
    service_account = "ftrick-gke-sa@${var.project_id}.iam.gserviceaccount.com"
    oauth_scopes = [
      "https://www.googleapis.com/auth/cloud-platform",
    ]
  }
}

data "google_client_config" "default" {}