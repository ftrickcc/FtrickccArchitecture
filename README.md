# 🏗️ ftrickConsultora - Arquitectura Cloud Nativa

Este repositorio define la arquitectura base de **ftrickConsultora**, una empresa constructora digital, con un enfoque moderno y automatizado usando tecnologías cloud-native y GitOps.

## 🚀 Tecnologías principales

- **Laravel** – Backend principal para gestión de proyectos constructivos
- **Docker** – Contenerización de servicios
- **Terraform** – Infraestructura como código (IaC) sobre GCP
- **Google Cloud Platform (GCP)** – Plataforma cloud donde se despliega toda la arquitectura
- **Argo CD** – Implementación GitOps para despliegue continuo
- **GitHub Actions** – Automatización CI/CD
- **GitOps** – Estrategia de despliegue basada en Git como única fuente de verdad

---

## 🧱 Estructura del repositorio

```bash
ftrickArchitecture/
├── app/                    # Código fuente Laravel
├── infra/
│   └── gcp/                # Código Terraform para GCP
│       └── modules/        # Módulos reutilizables
├── .github/workflows/      # Pipelines de CI/CD con GitHub Actions
├── manifests/              # Archivos declarativos para Argo CD y Kubernetes
└── docker/                 # Dockerfiles y configuración de contenedores
