##/home/liann/ftrickArchitecture/infra/gcp/modules/gke-cluster/variables.tf
variable "cluster_name" {
  description = "Nombre del clúster de GKE"
  type        = string
}

variable "region" {
  description = "Región de GCP"
  type        = string
}

variable "zone" {
  description = "Zona de GCP"
  type        = string
}

variable "project_id" {
  description = "ID del proyecto de GCP"
  type        = string
}

variable "initial_nodes" {
  description = "Número inicial de nodos para el clúster"
  type        = number
}

variable "machine_type" {
  description = "Tipo de máquina para el pool de nodos"
  type        = string
}
