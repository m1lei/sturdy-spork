<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Orchid\Attachment\File as OrchidFile;

class IndexSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Города и категории
        $city = City::firstOrCreate(['slug' => 'solnechnogorsk'], ['name' => 'Солнечногорск']);
        $city2 = City::firstOrCreate(['slug' => 'dmitrov'], ['name' => 'Дмитров']);
        $city3 = City::firstOrCreate(['slug' => 'serpukhov'], ['name' => 'Серпухов']);
        City::firstOrCreate(['slug' => 'zaraysk'], ['name' => 'Зарайск']);
        City::firstOrCreate(['slug' => 'klin'], ['name' => 'Клин']);

        $cat = Category::firstOrCreate(['slug' => 'parki'], ['name' => 'Парки']);
        $cat2 = Category::firstOrCreate(['slug' => 'usadby'], ['name' => 'Усадьбы']);
        $cat3 = Category::firstOrCreate(['slug' => 'dvorcy'], ['name' => 'Дворцы']);
        Category::firstOrCreate(['slug' => 'oteli'], ['name' => 'Отели']);

        // 2. Места (Places)
        $place1 = Place::firstOrCreate(['slug' => 'arxangelskoe'], [
            'name' => 'Музей-усадьба «Архангельское»',
            'description' => 'Уютный парк на берегу озера...',
            'address' => 'посёлок Архангельское, Красногорск',
            'price_from' => '10000',
            'city_id' => $city->id,
            'category_id' => $cat->id,
        ]);
        $this->uploadImage($place1, 'seed_image/example.png'); // Загрузка через Orchid

        $place2 = Place::firstOrCreate(['slug' => 'park-pexorka'], [
            'name' => 'Парк «Пехорка»',
            'description' => 'Один из самых современных парков...',
            'address' => 'Балашиха, парк Пехорка',
            'price_from' => '0',
            'city_id' => $city2->id,
            'category_id' => $cat2->id,
        ]);
        $this->uploadImage($place2, 'seed_image/example.png');

        // 3. Статьи (Articles)
        $article = Article::firstOrCreate(['slug' => 'kak-vybrat-ploshchadku'], [
            'title' => 'По каким параметрам выбрать лучшую площадку для свадьбы?',
            'content' => '<p>Размеры места для погрузки...</p>',
        ]);
        $this->uploadImage($article, 'seed_image/example.png');

        // 4. Портфолио (Portfolio)
        $portfolio1 = Portfolio::firstOrCreate(['slug' => 'svadba-v-arxangelskom'], [
            'title' => 'Свадьба в Архангельском',
            'place_id' => $place1->id
        ]);
        $this->uploadImage($portfolio1, 'seed_image/example.png');
    }

    /**
     * Вспомогательный метод для загрузки фото в Orchid
     */
    private function uploadImage($model, $relativePatch)
    {
        $fullPath = storage_path('app/' . $relativePatch);

        if (file_exists($fullPath)) {
            $file = new UploadedFile(
                $fullPath,               //Путь к файлу
                basename($fullPath),     //Имя файла
                0,                       // Код ошибки (0 = успех)
                true                     //ТЕСТОВЫЙ РЕЖИМ (важно для сидера)
            );

            //Передаем объект в загрузчик Orchid
            $attachment = (new \Orchid\Attachment\File($file))->load();

            $model->attachment()->syncWithoutDetaching([$attachment->id]);
        }
    }
}
