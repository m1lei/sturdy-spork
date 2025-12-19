#<h1>#Не raboтает слайдер и некоторые js файлы и некоторые css классы##</h1>
рабочие маршруты прописаны в routes/web.php

Запуск
<p><code>git clone https://github.com/m1lei/sturdy-spork.git</code> Клонируем репозиторий</p>
<p><code>cd sturdy-spork/</code> заходим в директорию проекта</p>
<p>Ставим зависимости</p>
<code>composer install
npm install</code>
<p>Из .env.example создаем .env со своим подключением к бд</p>
<code>cp .env.example .env</code>
<p>Генерируем App key</p>
<code>php artisan key:generate</code>
<p>Производим миграции</p>
<code>php artisan migrate</code>
<p>Генерируем ссылку для корректного отображение картинок</p>
<code>php artisan storage:link</code>
<p>Поднимаем среду node</p>
<code>npm run dev</code>
<p>Создаем root пользователя для взаимодействия с orcid по адресу /admin</p>
<code>php artisan orchid:admin  {имя} {email} {password}</code>
<p>Поднимаем сервер</p>
<code>php artisan serve</code>

