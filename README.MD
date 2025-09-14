# INSTALACION DE LARAVEL PERMISSION
composer require spatie/laravel-permission

# LLAMAMOS LAS TABLAS DEL LARAVEL PERMISSION QUE ESTAN EN SPATIE DEL VENDOR
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"