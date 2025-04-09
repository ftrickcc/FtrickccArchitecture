##/home/liann/ftrickArchitecture/infra/gcp/modules/helm-deploy/outputs.tf
output "status" {
  value = helm_release.app.status
}