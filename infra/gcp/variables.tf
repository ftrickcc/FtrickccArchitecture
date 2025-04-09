##/home/liann/ftrickArchitecture/infra/gcp/variables.tf

variable "project_id" {
  description = "ID del proyecto en GCP"
  type        = string
}

variable "region" {
  description = "Región de GCP donde se desplegarán los recursos"
  type        = string
  default     = "us-central1"
}

variable "zone" {
  description = "Zona de GCP donde se desplegarán los recursos"
  type        = string
  default     = "us-central1-a"
}

variable "tfstate_bucket" {
  description = "Nombre del bucket en GCS para almacenar el estado de Terraform"
  type        = string
}

variable "cluster_name" {
  description = "Nombre del clúster de GKE"
  type        = string
  default     = "my-gke-cluster"
}

variable "initial_nodes" {
  description = "Número inicial de nodos en el clúster"
  type        = number
  default     = 3
}

variable "machine_type" {
  description = "Tipo de máquina para el pool de nodos"
  type        = string
  default     = "e2-medium"
}

# Variables para el despliegue vía Helm

variable "app_release_name" {
  description = "Nombre de la release de Helm (aplicación)"
  type        = string
  default     = "my-app"
}

variable "helm_chart" {
  description = "Nombre del chart de Helm a desplegar"
  type        = string
  default     = "my-app-chart"
}

variable "helm_repo" {
  description = "URL del repositorio del chart de Helm"
  type        = string
  default     = "https://example.com/charts"
}

variable "helm_version" {
  description = "Versión del chart de Helm"
  type        = string
  default     = "1.0.0"
}

variable "helm_namespace" {
  description = "Namespace en Kubernetes en el que desplegar la aplicación"
  type        = string
  default     = "default"
}

variable "helm_values" {
  description = "Valores en formato YAML para el chart de Helm. Puedes definirlos inline o dejarlo vacío si no requieres sobreescribir nada."
  type        = string
  # Puedes definirlo literal de la siguiente forma, si lo deseas:
  # default = <<EOF
  # replicas: 2
  # image:
  #   tag: "1.0.0"
  # EOF
  default = ""
}

variable "instance_name" {
  description = "Nombre de la instancia de Cloud SQL"
  type        = string
}

variable "vpc_network_id" {
  description = "ID (o self link) de la red VPC en la que se conectará la instancia de Cloud SQL"
  type        = string
}

variable "db_password" {
  description = "Contraseña del usuario de la base de datos"
  type        = string
  sensitive   = true
}

variable "high_availability" {
  description = "Indica si la instancia de Cloud SQL debe ser de alta disponibilidad"
  type        = bool
}

variable "tier" {
  description = "Tier o tipo de máquina para la instancia de Cloud SQL (por ejemplo, db-f1-micro)"
  type        = string
}

variable "deletion_protection" {
  description = "Protección contra eliminación accidental de la instancia"
  type        = bool
  default     = false
}

variable "db_name" {
  description = "Nombre de la base de datos que se creará en la instancia de Cloud SQL"
  type        = string
}

variable "db_user" {
  description = "Nombre del usuario para la base de datos en Cloud SQL"
  type        = string
}

variable "IP_RANGE" {
  description = "Rango de IPs para la red VPC"
  type        = string
}