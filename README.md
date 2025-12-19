#<h1>#Не raboтает слайдер и некоторые js файлы и некоторые css классы##</h1>
рабочие маршруты прописаны в routes/web.php

Заpycк
git clone https://github.com/m1lei/sturdy-spork.git
cd sturdy-spork/
composer install
npm install
Для sqlite:
touch database/database.sqlite
Создаем файл .env из .env.example - cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
npm run dev   # dev-режим или npm run build #для продакшена

php artisan orchid:admin admin admin@example.ru passwordphp artisan orchid:admin admin admin@example.ru password


php artisan serve запуск

admin панель orchid - готово создание place, name-user,password-1234, email- root@gmail.com
