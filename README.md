## Getting Started

Para comenzar, tienes que renombrar .env.example a .env y ejecutar sh init.sh en el directorio raíz.

SPA clasificador de perros: http://localhost:8080
Cópia de la pagina Companies: http://localhost:8080/companies

O sigue estos pasos para poner en marcha el proyecto en tu máquina local.

### Prerequisites

- PHP (^8.1)
- Composer (https://getcomposer.org/)
- MySQL
- Node.js (^20 || ^18 || ^16)
- npm (>= 6.13.4)

### Instalación

```bash
# 1. Clonar el Repositorio
git clone https://github.com/yana-tolstobrova/prueba_tecnica.git

## Instalación de la parte Backend

# 2. Navegar al Directorio del Backend
cd backend

# 3. Instalar Dependencias
composer install

# 4. Crear Archivo de Entorno
# Renombrar .env.example a .env

# 6. Crear Base de Datos
# Crea una base de datos MySQL llamada 'dogs_backend'.

# 7. Ejecutar Migraciones
php artisan migrate

# 8. Ejecutar Seeders
php artisan db:seed

# 9. Iniciar Servidor de Desarrollo
php artisan serve

## Instalación de la parte Frontend
# 10. Navegar al Directorio del Frontend
cd frontend

# 11. Instalar Dependencias del Frontend
npm install

# 12. Iniciar Servidor de Desarrollo del Frontend
npm run dev 
