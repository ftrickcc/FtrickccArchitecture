resource "google_sql_database_instance" "instance" {
  name             = var.instance_name
  region           = var.region
  database_version = "MYSQL_8_0"

  settings {
    tier              = var.tier
    availability_type = var.high_availability ? "REGIONAL" : "ZONAL"

    backup_configuration {
      enabled            = true
      binary_log_enabled = var.high_availability
      start_time         = "02:00"
    }

    ip_configuration {
      ipv4_enabled    = false
      private_network = var.vpc_network_id
    }
  }

  deletion_protection = var.deletion_protection
}

resource "google_sql_database" "database" {
  name     = var.db_name
  instance = google_sql_database_instance.instance.name
}

resource "google_sql_user" "user" {
  name     = var.db_user
  instance = google_sql_database_instance.instance.name
  password = var.db_password
}
