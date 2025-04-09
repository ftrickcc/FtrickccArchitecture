##/home/liann/ftrickArchitecture/infra/gcp/modules/helm-deploy/variables.tf
variable "release_name" {
  description = "Nombre de la release de Helm"
  type        = string
}

variable "chart_name" {
  description = "Nombre del chart de Helm"
  type        = string
}

variable "chart_repo" {
  description = "URL del repositorio del chart de Helm"
  type        = string
}

variable "chart_version" {
  description = "Versión del chart de Helm"
  type        = string
}

variable "namespace" {
  description = "Namespace en el que desplegar la aplicación"
  type        = string
}

variable "values" {
  description = "Valores en YAML para el chart de Helm"
  type        = string
  default     = ""
}
