##/home/liann/ftrickArchitecture/infra/gcp/outputs.tf
output "cluster_endpoint" {
  description = "The endpoint for the GKE cluster"
  value       = module.gke_cluster.endpoint
}

output "cluster_name" {
  description = "The name of the GKE cluster"
  value       = module.gke_cluster.name
}

output "argocd_status" {
  value = helm_release.argocd.status
}