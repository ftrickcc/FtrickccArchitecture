resource "kubernetes_namespace" "namespace" {
  metadata {
    name = var.namespace
  }
}

resource "helm_release" "app" {
  name             = var.release_name
  repository       = var.chart_repo
  chart            = var.chart_name
  version          = var.chart_version
  namespace        = var.namespace
  create_namespace = true
  
  values = [var.values]
  
  # Añadir estas configuraciones
  timeout = 1200  # 20 minutos en segundos
  wait = true
  atomic = false  # Desactiva el rollback automático
  
  # Opcional: Si necesitas esperar a que ciertos recursos estén listos
  wait_for_jobs = true         # Espera a que los Jobs se completen
    depends_on = [kubernetes_namespace.namespace]

}