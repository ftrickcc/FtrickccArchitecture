output "instance_connection_name" {
  description = "Nombre de conexión de la instancia de Cloud SQL"
  value       = google_sql_database_instance.instance.connection_name
}

output "instance_self_link" {
  description = "Self link de la instancia de Cloud SQL"
  value       = google_sql_database_instance.instance.self_link
}

output "database_name" {
  description = "Nombre de la base de datos creada"
  value       = google_sql_database.database.name
}
