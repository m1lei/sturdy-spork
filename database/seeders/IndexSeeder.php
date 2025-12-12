<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = City::firstOrCreate(['slug' => 'solnechnogorsk'], ['name' => 'Солнечногорск']);
        $city2 = City::firstOrCreate(['slug' => 'dmitrov'], ['name' => 'Дмитров']);
        $city3 = City::firstOrCreate(['slug' => 'serpukhov'], ['name' => 'Серпухов']);
        City::firstOrCreate(['slug' => 'zaraysk'], ['name' => 'Зарайск']);
        City::firstOrCreate(['slug' => 'klin'], ['name' => 'Клин']);

        $cat = Category::firstOrCreate(['slug' => 'parki'], ['name' => 'Парки']);
        $cat2 = Category::firstOrCreate(['slug' => 'usadby'], ['name' => 'Усадьбы']);
        $cat3 = Category::firstOrCreate(['slug' => 'dvorcy'], ['name' => 'Дворцы']);
        Category::firstOrCreate(['slug' => 'oteli'], ['name' => 'Отели']);


        $place2 = Place::firstOrCreate(
            ['slug' => 'park-pexorka',],
           [
           'name'=>'Парк «Пехорка»',
            'description' => '0дин из самых современных парков Подмосковья, площадкам которого нет аналогов во всей области! .',
            'address' => 'Балашиха, Московская область, парк Пехорка',
            'price_from' => '0',
            'image' => ['path'=>'places/2.png'],
            'city_id' => $city2->id,
            'category_id' => $cat2->id,]
        );
        $place1 = Place::firstOrCreate(
            ['slug' => 'arxangelskoe',],
          [ 'name'=>'Музей-усадьба «Архангельское»',
            'description' => 'Уютный парк на берегу озера...',
            'address' => 'посёлок Архангельское, городской округ Красногорск, Московская область, территория Музей-заповедник Архангельское',
            'price_from' => '10000',
            'image' => ['path'=>'places/1.png'],
            'city_id' => $city->id,
            'category_id' => $cat->id,]
        );
        Place::firstOrCreate(
            ['slug' => 'svoya-lokaciya',],
          [ 'name'=>'Lorem',
            'description' => 'UMpuls body for not them',
            'address' => 'NET',
            'price_from' => '10000',
            'image' => ['path'=>'places/3.png'],
            'city_id' => $city3->id,
            'category_id' => $cat3->id,]
        );

        Article::firstOrCreate(['slug'=>'kak-vybrat-ploshchadku'],[
            'title'=>'По каким параметрам выбрать лучшую площадку для свадьбы?',
            'image'=>'articles/1.png',
            'content'=>'<p>Размеры места для погрузки и разгрузки...</p>',
        ]);
        Article::firstOrCreate(['slug'=>'svad-trendy-2024'],[
            'title'=>'Все свадебные тренды 2024 года',
            'image'=>'articles/2.png',
            'content'=>'<p>Новые цвета, фактуры, форматы...</p>',
        ]);
        Article::firstOrCreate(['slug'=>'fotozony-i-dekor'],[
            'title'=>'ТОП-10 фото-зон в Подмосковье',
            'image'=>'articles/3.png',
            'content'=>'<p>Где сделать идеальные кадры...</p>',
        ]);

        Portfolio::firstOrCreate(['slug' => 'svadba-v-arxangelskom'],
        ['title'=>'Свадьба в Архангельском', 'place_id'=>$place1->id,'images'=>['path'=>'portfolio/1.png']]);

        Portfolio::firstOrCreate(['slug' => 'svadba-v-dubrovicax'],
        ['title'=>'Свадьба в Дубровицах', 'place_id'=>$place2->id,'images'=>['path'=>'portfolio/2.png']]);
    }
}
