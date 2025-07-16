# Guía de Instalación Detallada

## Requisitos del Sistema

### Software Necesario
- **PHP 8.2+** con las siguientes extensiones:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
  - Fileinfo
- **Composer** (Gestor de dependencias de PHP)
- **Node.js 18+** y **npm**
- **Git** para control de versiones
- **Servidor web** (Apache, Nginx, o servidor integrado de PHP)

### Base de Datos
- **MySQL 8.0+** o **MariaDB 10.3+** (recomendado)
- **SQLite 3.8+** (para desarrollo)

## Instalación Paso a Paso

### 1. Preparar el Entorno

#### En Windows con XAMPP:
1. Descargar e instalar XAMPP
2. Iniciar Apache y MySQL desde el panel de control
3. Abrir terminal en `C:\xampp\htdocs\`

#### En macOS:
```bash
# Instalar Homebrew si no está instalado
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

# Instalar PHP, Composer y Node.js
brew install php composer node
```

#### En Linux (Ubuntu/Debian):
```bash
# Actualizar paquetes
sudo apt update

# Instalar PHP y extensiones
sudo apt install php8.2 php8.2-cli php8.2-common php8.2-mysql php8.2-xml php8.2-xmlrpc php8.2-curl php8.2-gd php8.2-imagick php8.2-dev php8.2-imap php8.2-mbstring php8.2-opcache php8.2-soap php8.2-zip php8.2-intl

# Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Instalar Node.js
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt-get install -y nodejs
```

### 2. Clonar y Configurar el Proyecto

```bash
# Clonar el repositorio
git clone https://github.com/SanR1o/Inventario.git
cd Inventario

# Instalar dependencias de PHP
composer install

# Copiar archivo de configuración
cp .env.example .env  # En Linux/macOS
copy .env.example .env  # En Windows

# Generar clave de aplicación
php artisan key:generate

# Instalar dependencias de Node.js
npm install

# Compilar assets
npm run build
```

### 3. Configurar Base de Datos

#### Opción 1: MySQL/MariaDB
1. Crear base de datos:
```sql
CREATE DATABASE inventario CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Editar `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventario
DB_USERNAME=root
DB_PASSWORD=tu_password
```

#### Opción 2: SQLite (para desarrollo)
1. Editar `.env`:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/ruta/completa/al/proyecto/database/database.sqlite
```

2. Crear archivo de base de datos:
```bash
touch database/database.sqlite
```

### 4. Ejecutar Migraciones y Seeders

```bash
# Ejecutar migraciones
php artisan migrate

# Poblar base de datos con datos iniciales
php artisan db:seed

# O hacer ambos en un solo comando
php artisan migrate:fresh --seed
```

### 5. Configurar Permisos (Linux/macOS)

```bash
# Dar permisos de escritura a directorios necesarios
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### 6. Iniciar el Servidor

```bash
# Servidor de desarrollo de Laravel
php artisan serve

# Con puerto personalizado
php artisan serve --port=8080

# Accesible desde otras máquinas
php artisan serve --host=0.0.0.0 --port=8000
```

## Verificación de la Instalación

### 1. Verificar que el servidor esté funcionando
- Abrir navegador en `http://localhost:8000`
- Debería aparecer la página de login

### 2. Probar login con credenciales de prueba
- **Admin**: `admin@example.com` / `admin123`
- **Coordinador**: `coordinador@example.com` / `coordinador123`

### 3. Verificar funcionalidades
- Acceso al dashboard
- Navegación entre módulos (Categorías, Subcategorías, Productos)
- Permisos según el rol

## Configuración para Producción

### Variables de Entorno Importantes
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com

# Base de datos de producción
DB_CONNECTION=mysql
DB_HOST=tu-servidor-db
DB_PORT=3306
DB_DATABASE=inventario_prod
DB_USERNAME=usuario_prod
DB_PASSWORD=password_seguro

# Configuración de mail (opcional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@gmail.com
MAIL_PASSWORD=tu-password
MAIL_ENCRYPTION=tls
```

### Comandos de Optimización
```bash
# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Instalar solo dependencias de producción
composer install --no-dev --optimize-autoloader
```

## Solución de Problemas Comunes

### Error: "Class 'PDO' not found"
```bash
# Instalar extensión PDO
sudo apt-get install php8.2-pdo php8.2-mysql  # Linux
```

### Error: "Permission denied"
```bash
# Dar permisos correctos
sudo chown -R www-data:www-data /path/to/project
sudo chmod -R 755 /path/to/project
sudo chmod -R 777 storage/ bootstrap/cache/
```

### Error: "Vite manifest not found"
```bash
# Compilar assets
npm run build
```

### Error de migraciones
```bash
# Resetear migraciones
php artisan migrate:reset
php artisan migrate:fresh --seed
```
