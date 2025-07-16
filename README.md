# Inventario
Sistema de inventario desarrollado con Laravel y PHP

## Requisitos Previos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- Base de datos (MySQL/MariaDB o SQLite)
- Git (para clonar el repositorio)

## Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/SanR1o/Inventario.git
cd Inventario
```

### 2. Configurar dependencias de PHP
```bash
composer install
```

### 3. Configurar archivo de entorno
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

### 4. Generar clave de aplicación
```bash
php artisan key:generate
```

### 5. Configurar base de datos
```bash
# Crear base de datos (si usas MySQL)
# Crear base de datos llamada 'inventario'

# Ejecutar migraciones
php artisan migrate

# Poblar base de datos con datos iniciales (incluye usuarios de prueba)
php artisan db:seed
```

### 6. Configurar dependencias de Node.js
```bash
npm install
```

### 7. Compilar assets
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

## Credenciales de Prueba

El sistema incluye usuarios de prueba:

- **Administrador**: `admin@example.com` / `admin123`
- **Coordinador**: `coordinador@example.com` / `coordinador123`

## Estructura del Proyecto

- **Usuarios**: Sistema de autenticación con roles (Admin/Coordinador)
- **Categorías**: Organización de productos
- **Subcategorías**: Subdivisión de categorías
- **Productos**: Gestión del inventario

## Roles y Permisos

- **Admin**: Acceso completo a todas las funcionalidades
- **Coordinador**: Puede ver y editar categorías, subcategorías y productos (no puede eliminar ni gestionar usuarios)

## Comandos Útiles

```bash
# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
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

## Documentación Adicional

Para información más detallada, consulta los archivos en la carpeta `/md`:

- [Guía de Instalación Detallada](md/INSTALLATION.md)
- [Configuración de Roles](md/ROLES.md)
- [Solución de Problemas](md/TROUBLESHOOTING.md)

## Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT. Ver [LICENSE](LICENSE) para más detalles. 