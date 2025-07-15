# 📚 Laravel Libros

Una aplicación web para registrar y gestionar tus libros leídos, pendientes y favoritos. Hecha con ❤️ usando Laravel.

## 🚀 Funcionalidades

- Añadir, editar y eliminar libros
- Campos: título, autor, género, formato, puntuación, opinión, favorito, etc.
- Ver libros por estado de lectura
- Registro de libros prestados
- Estadísticas
- Responsive y con diseño minimalista

## 🧰 Tecnologías

- [Laravel 10](https://laravel.com)
- PHP 8+
- Tailwind CSS
- Blade
- SQLite
- Chart.js
- Render (para despliegue gratuito)

## 🔧 Instalación local

```bash
git clone https://github.com/tu-usuario/laravel-libros.git
cd laravel-libros
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

