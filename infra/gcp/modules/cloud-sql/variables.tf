variable "instance_name" {
  description = "Nombre de la instancia de Cloud SQL"
  type        = string
}

variable "region" {
  description = "Región en la que se desplegará la instancia"
  type        = string
}

variable "tier" {
  description = "Tier o máquina elegida para la instancia (e.g., db-f1-micro, db-n1-standard-1, etc.)"
  type        = string
}

variable "high_availability" {
  description = "Indica si la instancia se despliega en alta disponibilidad"
  type        = bool
  default     = false
}

variable "vpc_network_id" {
  description = "ID o self link de la red VPC a la que se conecta la instancia"
  type        = string
}

variable "deletion_protection" {
  description = "Protección contra eliminación accidental"
  type        = bool
  default     = false
}

variable "db_name" {
  description = "Nombre de la base de datos a crear"
  type        = string
}

variable "db_user" {
  description = "Nombre del usuario de la base de datos"
  type        = string
}

variable "db_password" {
  description = "Contraseña del usuario de la base de datos"
  type        = string
  sensitive   = true
}
