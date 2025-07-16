# Solución de Problemas Comunes

## Problemas de Instalación

### Error: "composer command not found"
**Problema**: Composer no está instalado o no está en el PATH
**Solución**:
```bash
# Windows
# Descargar e instalar desde https://getcomposer.org/

# macOS
brew install composer

# Linux
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### Error: "Class 'PDO' not found"
**Problema**: Extensión PDO de PHP no está instalada
**Solución**:
```bash
# Ubuntu/Debian
sudo apt-get install php8.2-pdo php8.2-mysql

# CentOS/RHEL
sudo yum install php-pdo php-mysql

# Windows (XAMPP)
# Descomentar extension=pdo_mysql en php.ini
```

### Error: "Permission denied" en storage/
**Problema**: Permisos insuficientes en directorios
**Solución**:
```bash
# Linux/macOS
sudo chmod -R 755 storage/
sudo chmod -R 755 bootstrap/cache/

# O más específico
sudo chown -R www-data:www-data storage/
sudo chown -R www-data:www-data bootstrap/cache/
```

## Problemas de Base de Datos

### Error: "SQLSTATE[HY000] [1045] Access denied"
**Problema**: Credenciales incorrectas en .env
**Solución**:
1. Verificar credenciales en `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventario
DB_USERNAME=root
DB_PASSWORD=tu_password_correcto
```

2. Probar conexión:
```bash
mysql -u root -p
```

### Error: "SQLSTATE[HY000] [2002] Connection refused"
**Problema**: MySQL no está ejecutándose
**Solución**:
```bash
# Linux
sudo systemctl start mysql

# macOS
brew services start mysql

# Windows (XAMPP)
# Iniciar MySQL desde el panel de control
```

### Error: "Base table or view not found"
**Problema**: Migraciones no ejecutadas
**Solución**:
```bash
# Verificar estado de migraciones
php artisan migrate:status

# Ejecutar migraciones pendientes
php artisan migrate

# Resetear completamente
php artisan migrate:fresh --seed
```

## Problemas de Autenticación

### Error: "Target class [coordinador] does not exist"
**Problema**: Middleware no registrado correctamente
**Solución**:
1. Verificar `bootstrap/app.php`:
```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'coordinador' => \App\Http\Middleware\CoordinadorMiddleware::class,
    ]);
})
```

2. Limpiar cache:
```bash
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

### Error: "403 Forbidden" al acceder a rutas
**Problema**: Usuario no tiene permisos necesarios
**Solución**:
1. Verificar rol del usuario:
```sql
SELECT id, name, email, role FROM users WHERE email = 'tu@email.com';
```

2. Cambiar rol si es necesario:
```bash
php artisan tinker
```
```php
$user = User::where('email', 'tu@email.com')->first();
$user->role = 'admin';
$user->save();
```

### Error: "The password field is required"
**Problema**: Validación de contraseña fallando
**Solución**:
1. Verificar que la contraseña cumple los requisitos
2. Usar credenciales de prueba:
   - Admin: `admin@example.com` / `admin123`
   - Coordinador: `coordinador@example.com` / `coordinador123`

## Problemas de Frontend

### Error: "Vite manifest not found"
**Problema**: Assets no compilados
**Solución**:
```bash
# Instalar dependencias
npm install

# Compilar assets
npm run build

# Para desarrollo
npm run dev
```

### Error: "Module not found"
**Problema**: Dependencias de Node.js no instaladas
**Solución**:
```bash
# Eliminar node_modules y reinstalar
rm -rf node_modules
rm package-lock.json
npm install
```

### Estilos CSS no se aplican
**Problema**: Assets no cargados correctamente
**Solución**:
1. Verificar que los assets están compilados:
```bash
ls -la public/build/
```

2. Recompilar:
```bash
npm run build
```

3. Verificar en el HTML que se cargan los assets:
```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

## Problemas de Rendimiento

### Página muy lenta
**Problema**: Cache no optimizado
**Solución**:
```bash
# Limpiar todos los caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Consultas lentas
**Problema**: Queries N+1 o falta de índices
**Solución**:
1. Habilitar query logging:
```php
// En AppServiceProvider
DB::listen(function ($query) {
    Log::info($query->sql, $query->bindings);
});
```

2. Optimizar queries con eager loading:
```php
// En lugar de
$productos = Producto::all();

// Usar
$productos = Producto::with('categoria', 'subcategoria')->get();
```

## Problemas de Producción

### Error 500 sin detalles
**Problema**: Logs no visibles
**Solución**:
1. Verificar logs:
```bash
tail -f storage/logs/laravel.log
```

2. Habilitar debug temporalmente:
```env
APP_DEBUG=true
```

3. Verificar permisos:
```bash
sudo chmod -R 755 storage/
```

### Sesiones no funcionan
**Problema**: Configuración de sesiones incorrecta
**Solución**:
1. Verificar `.env`:
```env
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

2. Limpiar sesiones:
```bash
php artisan session:clear
```

## Comandos de Diagnóstico

### Verificar configuración
```bash
# Ver configuración actual
php artisan config:show

# Verificar conexión DB
php artisan migrate:status

# Verificar rutas
php artisan route:list

# Verificar middlewares
php artisan route:list --middleware
```

### Verificar logs
```bash
# Ver logs en tiempo real
tail -f storage/logs/laravel.log

# Ver errores específicos
grep "ERROR" storage/logs/laravel.log

# Limpiar logs
> storage/logs/laravel.log
```

### Verificar permisos
```bash
# Verificar propietario
ls -la storage/
ls -la bootstrap/cache/

# Verificar procesos
ps aux | grep php
ps aux | grep apache2
```

## Herramientas de Debugging

### Laravel Tinker
```bash
# Acceder a consola interactiva
php artisan tinker

# Ejemplos útiles
User::all();
User::where('email', 'admin@example.com')->first();
Auth::attempt(['email' => 'admin@example.com', 'password' => 'admin123']);
```

### Laravel Telescope (Opcional)
```bash
# Instalar Telescope para debugging avanzado
composer require laravel/telescope
php artisan telescope:install
php artisan migrate
```

### Debugging en Blade
```blade
@php
    dd($variable); // Dump and die
    dump($variable); // Solo dump
@endphp
```

## Contacto para Soporte

Si los problemas persisten:

1. **Revisar Issues**: Verificar issues abiertos en GitHub
2. **Crear Issue**: Describir el problema con:
   - Versión de PHP
   - Versión de Laravel
   - Sistema operativo
   - Pasos para reproducir
   - Error completo
3. **Logs**: Incluir fragmentos relevantes de `storage/logs/laravel.log`

## Recursos Adicionales

- [Documentación de Laravel](https://laravel.com/docs)
- [Laravel Debugging](https://laravel.com/docs/debugging)
- [Composer Troubleshooting](https://getcomposer.org/doc/articles/troubleshooting.md)
- [PHP Manual](https://www.php.net/manual/)
