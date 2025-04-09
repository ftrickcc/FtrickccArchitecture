##/home/liann/ftrickArchitecture/infra/gcp/modules/gke-cluster/outputs.tf
output "endpoint" {
  value = google_container_cluster.primary.endpoint
}

output "name" {
  value = google_container_cluster.primary.name
}

output "master_auth" {
  value = google_container_cluster.primary.master_auth
}

output "kubernetes_host" {
  value = "https://${google_container_cluster.primary.endpoint}"
}

output "kubernetes_token" {
  value = data.google_client_config.default.access_token
  sensitive = true
}

output "kubernetes_ca_certificate" {
  value = base64decode(google_container_cluster.primary.master_auth[0].cluster_ca_certificate)
  sensitive = true
}