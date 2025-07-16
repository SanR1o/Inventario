# Sistema de Roles y Permisos

## Descripción General

El sistema de inventario utiliza un sistema de roles basado en middleware de Laravel para controlar el acceso a diferentes funcionalidades según el tipo de usuario.

## Roles Disponibles

### 1. Administrador (Admin)
- **Rol**: `admin`
- **Acceso**: Completo a todas las funcionalidades
- **Permisos**:
  - ✅ Gestionar usuarios (crear, ver, editar, eliminar)
  - ✅ Gestionar categorías (crear, ver, editar, eliminar)
  - ✅ Gestionar subcategorías (crear, ver, editar, eliminar)
  - ✅ Gestionar productos (crear, ver, editar, eliminar)
  - ✅ Acceso a todas las configuraciones del sistema

### 2. Coordinador
- **Rol**: `coordinador`
- **Acceso**: Limitado a gestión de inventario
- **Permisos**:
  - ❌ NO puede gestionar usuarios
  - ✅ Puede ver y editar categorías (NO eliminar)
  - ✅ Puede ver y editar subcategorías (NO eliminar)
  - ✅ Puede ver y editar productos (NO eliminar)
  - ❌ NO puede acceder a configuraciones del sistema

## Estructura de Permisos

### Middlewares Implementados

#### AdminMiddleware
```php
// Solo permite acceso a usuarios con rol 'admin'
if (Auth::check() && Auth::user()->role === 'admin') {
    return $next($request);
}
```

#### CoordinadorMiddleware
```php
// Permite acceso a usuarios con rol 'coordinador' o 'admin'
if (Auth::check() && (Auth::user()->role === 'coordinador' || Auth::user()->role === 'admin')) {
    return $next($request);
}
```

### Rutas Protegidas

#### Rutas Solo Admin
```php
Route::middleware('admin')->group(function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('subcategorias', SubcategoriaController::class);
    Route::resource('productos', ProductoController::class);
});
```

#### Rutas Coordinador (Admin también puede acceder)
```php
Route::middleware('coordinador')->group(function () {
    Route::resource('productos', ProductoController::class)->except(['destroy']);
    Route::resource('categorias', CategoriaController::class)->except(['destroy']);
    Route::resource('subcategorias', SubcategoriaController::class)->except(['destroy']);
});
```

## Usuarios de Prueba

El sistema incluye usuarios predefinidos para pruebas:

### Administrador
- **Email**: `admin@example.com`
- **Contraseña**: `admin123`
- **Rol**: `admin`

### Coordinador
- **Email**: `coordinador@example.com`
- **Contraseña**: `coordinador123`
- **Rol**: `coordinador`

## Crear Nuevos Usuarios

### 1. Mediante Seeder (Desarrollo)

Editar `database/seeders/AdminUserSeeder.php`:

```php
User::create([
    'name' => 'Nuevo Usuario',
    'email' => 'nuevo@example.com',
    'password' => Hash::make('password123'),
    'role' => 'coordinador' // o 'admin'
]);
```

Ejecutar:
```bash
php artisan db:seed --class=AdminUserSeeder
```

### 2. Mediante Interfaz Web (Producción)

Solo los administradores pueden crear nuevos usuarios a través de la interfaz web:
1. Iniciar sesión como admin
2. Ir a la sección "Usuarios"
3. Hacer clic en "Crear Usuario"
4. Llenar el formulario con los datos del usuario
5. Seleccionar el rol apropiado

## Modificar Roles Existentes

### 1. Directamente en la Base de Datos

```sql
-- Cambiar rol de un usuario específico
UPDATE users SET role = 'admin' WHERE email = 'usuario@example.com';

-- Ver todos los usuarios y sus roles
SELECT id, name, email, role FROM users;
```

### 2. Mediante Tinker (Herramienta de Laravel)

```bash
php artisan tinker
```

```php
// Buscar usuario por email
$user = User::where('email', 'usuario@example.com')->first();

// Cambiar rol
$user->role = 'admin';
$user->save();

// Verificar cambio
echo $user->role;
```

## Agregar Nuevos Roles

### 1. Crear Nuevo Middleware

```bash
php artisan make:middleware SupervisorMiddleware
```

### 2. Implementar la Lógica

```php
// app/Http/Middleware/SupervisorMiddleware.php
public function handle(Request $request, Closure $next): Response
{
    if (Auth::check() && Auth::user()->role === 'supervisor') {
        return $next($request);
    }
    abort(403, 'No tienes permisos de supervisor');
}
```

### 3. Registrar el Middleware

En `bootstrap/app.php`:
```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'coordinador' => \App\Http\Middleware\CoordinadorMiddleware::class,
        'supervisor' => \App\Http\Middleware\SupervisorMiddleware::class,
    ]);
})
```

### 4. Definir Rutas Protegidas

```php
// routes/web.php
Route::middleware('supervisor')->group(function () {
    Route::resource('reportes', ReporteController::class);
});
```

## Validación de Roles en Vistas

### Blade Templates

```blade
@if(Auth::user()->role === 'admin')
    <a href="{{ route('usuarios.index') }}">Gestionar Usuarios</a>
@endif

@if(Auth::user()->role === 'admin' || Auth::user()->role === 'coordinador')
    <a href="{{ route('productos.index') }}">Gestionar Productos</a>
@endif
```

### Directivas Personalizadas

Crear directivas personalizadas en `AppServiceProvider`:

```php
// app/Providers/AppServiceProvider.php
public function boot()
{
    Blade::if('admin', function () {
        return Auth::check() && Auth::user()->role === 'admin';
    });
    
    Blade::if('coordinador', function () {
        return Auth::check() && Auth::user()->role === 'coordinador';
    });
}
```

Usar en vistas:
```blade
@admin
    <button>Solo Admin</button>
@endadmin

@coordinador
    <button>Admin y Coordinador</button>
@endcoordinador
```

## Mejores Prácticas

### 1. Seguridad
- Nunca hardcodear roles en el código
- Usar middleware para proteger rutas
- Validar permisos tanto en backend como frontend
- Encriptar contraseñas siempre

### 2. Mantenibilidad
- Centralizar la lógica de permisos
- Usar constantes para roles
- Documentar cambios en permisos
- Mantener consistencia en nombres

### 3. Escalabilidad
- Considerar un sistema de permisos más granular para el futuro
- Implementar logging de cambios de roles
- Preparar para múltiples roles por usuario si es necesario

## Solución de Problemas

### Error: "Middleware [role] not found"
Verificar que el middleware está registrado en `bootstrap/app.php`

### Error: "Target class [role] does not exist"
Verificar que la clase del middleware existe y tiene el namespace correcto

### Usuario no puede acceder después de cambiar rol
Limpiar cache:
```bash
php artisan cache:clear
php artisan config:clear
```
