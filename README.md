# Eventos App

Aplicación de ejemplo desarrollada en clases para gestionar eventos, construida con Laravel.

## Datos de la asignatura

- **Asignatura:** INF560 - DESARROLLO WEB BACKEND
- **Sección/Grupo:** Grupo 2
- **Semestre:** 02-2026
- **Contexto:** Ejemplos en clases - Guía de Laboratorio 3 (eventos)
- **Repositorio:** [INF560-2026-02-EVENTOSAPP](https://github.com/HuascarFedor/INF560-2026-02-EVENTOSAPP)

## Stack técnico

- PHP ^8.3
- Laravel ^13.17
- Tailwind CSS 4
- Vite 8
- Pest (testing)
- Base de datos: PostgreSQL

## Requisitos previos

- PHP >= 8.3 con las extensiones habituales de Laravel (incluyendo `pdo_pgsql` y `pgsql`)
- PostgreSQL 13+ en ejecución (local o remoto)
- Composer 2
- Node.js 18+ y npm
- Git

## Clonar el proyecto

```bash
git clone https://github.com/HuascarFedor/INF560-2026-02-EVENTOSAPP.git eventos-app
cd eventos-app
```

## Instalación

1. Instalar dependencias de PHP:

   ```bash
   composer install
   ```

2. Copiar el archivo de entorno y generar la clave de la aplicación:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Crear el usuario y la base de datos en PostgreSQL:

   Ingresar a la terminal de PostgreSQL con un usuario que tenga permisos de administrador (por ejemplo `postgres`):

   ```bash
   psql -U postgres
   ```

   Dentro de la terminal de `psql`, crear el usuario/rol y la base de datos:

   ```sql
   CREATE USER eventos_user WITH PASSWORD 'clave_segura';
   CREATE DATABASE eventos_app OWNER eventos_user;
   GRANT ALL PRIVILEGES ON DATABASE eventos_app TO eventos_user;
   ```

   Salir de `psql`:

   ```sql
   \q
   ```

   Configurar la conexión editando las variables `DB_*` en el archivo `.env`:

   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=eventos_app
   DB_USERNAME=eventos_user
   DB_PASSWORD=clave_segura
   ```

   Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

4. Instalar dependencias de JavaScript:

   ```bash
   npm install
   ```



## Levantar el proyecto en desarrollo

Para iniciar el servidor de Laravel junto con Vite (compilación de assets en caliente):

```bash
composer run dev
```

Esto levanta simultáneamente el servidor PHP, el watcher de Vite, la cola y los logs.

Alternativamente, en terminales separadas:

```bash
php artisan serve
npm run dev
```

La aplicación quedará disponible en [http://localhost:8000](http://localhost:8000).

