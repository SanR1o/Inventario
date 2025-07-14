# Inventario
Sistema de inventario desarrollado con Laravel y PHP

## Requisitos Previos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- Base de datos (MySQL/MariaDB o SQLite)

## Instalación

### Configurar dependencias de PHP
```bash
composer install
```

### Configurar archivo de entorno
```bash
# Copiar archivo de configuración
copy .env.example .env

# Editar .env con tus configuraciones de base de datos
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=inventario
# DB_USERNAME=root
# DB_PASSWORD=
```

### Generar clave de aplicación
```bash
php artisan key:generate
```

### Configurar base de datos
```bash
# Crear base de datos (si usas MySQL)
# Crear base de datos llamada 'inventario'

# Ejecutar migraciones
php artisan migrate

# Poblar base de datos con datos iniciales
php artisan db:seed
```

### Configurar dependencias de Node.js
```bash
npm install
```

### Compilar assets (opcional)
```bash
npm run build
```

## Iniciar el proyecto

### Servidor de desarrollo
```bash
php artisan serve
```

El proyecto estará disponible en: http://localhost:8000

### Para desarrollo con Vite (assets en tiempo real)
```bash
npm run dev
```

## Estructura del Proyecto

- **Usuarios**: Sistema de autenticación con roles
- **Categorías**: Organización de productos
- **Subcategorías**: Subdivisión de categorías
- **Productos**: Gestión del inventario

## Comandos Útiles

```bash
# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Revertir migraciones
php artisan migrate:rollback

# Ejecutar migraciones desde cero
php artisan migrate:fresh --seed

# Ver rutas disponibles
php artisan route:list
```

## Configuración de Base de Datos

### MySQL (Recomendado)
1. Crear base de datos llamada 'inventario'
2. Configurar credenciales en .env
3. Ejecutar migraciones

### SQLite (Desarrollo)
1. El archivo se crea automáticamente
2. No requiere configuración adicional 