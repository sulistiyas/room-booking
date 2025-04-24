<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--   <title>Room Booking App - Laravel Installation Guide</title> -->
<!--   <style>
    body {
      font-family: sans-serif;
      line-height: 1.6;
      max-width: 800px;
      margin: auto;
      padding: 20px;
    }
    h1, h2, h3 {
      color: #333;
    }
    code {
      background: #f4f4f4;
      padding: 2px 4px;
      border-radius: 4px;
    }
    pre {
      background: #f4f4f4;
      padding: 10px;
      overflow-x: auto;
      border-left: 4px solid #ccc;
    }
    ul {
      padding-left: 20px;
    }
  </style> -->
</head>
<body>

  <h1>🏠 Room Booking App</h1>
  <p>A simple and efficient Laravel-based application for managing room bookings, schedules, and availability.</p>

  <h2>🚀 Features</h2>
  <ul>
    <li>User-friendly interface for booking and managing rooms</li>
    <li>Role-based access (Admin & User)</li>
    <li>Calendar view of room availability</li>
    <li>Notification for booking conflicts</li>
    <li>Built with <a href="https://filamentphp.com/" target="_blank">Laravel Filament</a> for admin panel</li>
  </ul>

  <h2>🛠 Installation</h2>

  <h3>Requirements</h3>
  <ul>
    <li>PHP >= 8.1</li>
    <li>Composer</li>
    <li>MySQL or other supported database</li>
    <li>Node.js & npm</li>
  </ul>

  <h3>1. Clone the Repository</h3>
  <pre><code>git clone https://github.com/sulistiyas/room-booking-app.git
cd room-booking-app</code></pre>

  <h3>2. Install Dependencies</h3>
  <pre><code>composer install
npm install && npm run build</code></pre>

  <h3>3. Environment Setup</h3>
  <pre><code>cp .env.example .env</code></pre>
  <p>Update the <code>.env</code> file with your database and mail credentials.</p>

  <h3>4. Generate App Key</h3>
  <pre><code>php artisan key:generate</code></pre>

  <h3>5. Run Migrations & Seeders</h3>
  <pre><code>php artisan migrate --seed</code></pre>

  <h3>6. Activate Role & Permission</h3>
  <pre><code>php artisan shield:setup</code></pre>
  <pre><code>php artisan shield:install</code></pre>

  <h3>7. Start Development Server</h3>
  <pre><code>php artisan serve</code></pre>
  <p>Visit <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a> in your browser.</p>

  <h2>🧑 Admin Access</h2>
  <p>By default, a demo admin account is created:</p>
  <ul>
    <li><strong>Email:</strong> admin@example.com</li>
    <li><strong>Password:</strong> password</li>
  </ul>
  <p>You can change this in the database or by editing the seeder.</p>

  <h2>📦 Built With</h2>
  <ul>
    <li>Laravel</li>
    <li>Filament Admin</li>
    <li>Tailwind CSS</li>
    <li>FullCalendar</li>
  </ul>

  <h2>🤝 Contribution</h2>
  <p>Feel free to fork and contribute! Pull requests are welcome.</p>

</body>
</html>



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
