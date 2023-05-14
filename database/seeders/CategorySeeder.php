<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categories = [
            [
                'title' => 'Производство',
                'children' => [
                    ['title' => 'Манжеты и уплотнения'],
                    ['title' => 'РВД и шланги'],
                    ['title' => 'Маслостанции'],
                ]
            ],
            [
                'title' => 'Товары',
                'children' => [
                    [
                        'title' => 'Уплотнения Kastas',
                        'children' => [
                            ['title' => 'Направляющие элементы'],
                            ['title' => 'Гидравлические уплотнительные элементы поршня-штока'],
                            ['title' => 'Гидравлические уплотнительные элементы поршня'],
                            ['title' => 'Гидравлические уплотнительные элементы штока'],
                            ['title' => 'Другие уплотнительные элементы'],
                            ['title' => 'Пневматические уплотнительные элементы поршня'],
                            ['title' => 'Пневматические уплотнительные элементы штока'],
                            ['title' => 'Радиальные уплотнительные элементы'],
                            ['title' => 'Статические уплотнительные элементы'],
                            ['title' => 'Грязесъемники'],
                        ],
                    ],
                    ['title' => 'Гидрокомпоненты'],
                    ['title' => 'Пневмокомпоненты'],
                    ['title' => 'Ремкомплекты гидроцилиндров'],
                    ['title' => 'Металлорукова'],
                    ['title' => 'Стальные трубки'],
                    ['title' => 'Запчасти'],
                ]
            ],
            [
                'title' => 'Ремонт',
                'children' => [
                    ['title' => 'Ремонт гидроцилиндров'],
                    ['title' => 'Ремонт пневмоцилиндров'],
                    ['title' => 'Ремонт маслостанций'],
                    ['title' => 'Ремонт гидронасосов'],
                    ['title' => 'Ремонт пневмонасосов'],
                    ['title' => 'Ремонт моторов'],
                    ['title' => 'Ремонт гидрораспределителей'],
                    ['title' => 'Ремонт гидромолотов'],
                ]
            ],
            ['title' => 'Блог'],
            [
                'title' => 'Компания',
                'children' => [
                    ['title' => 'О компании'],
                    ['title' => 'Новости'],
                ]
            ],
        ];

        foreach ($categories as $category) {
           Category::create($category);
        }

        $categories = Category::all();

        $date = date('Y-m-d');
        $filePath =  "public/storage/uploads/images/$date/";

        if (!file_exists($filePath)) {
            mkdir($filePath, 0755);
        }

        foreach ($categories as $category) {
            $fakerFileName = $faker->image(
                $filePath,
                300,
                300
            );

            $category->generatePath();

            $category->update([
                'description' => fake()->realText(500),
                'keywords' => fake()->words(fake()->numberBetween(3, 9)),
                'content' => fake()->realText(1500),
            ]);

            $mediaPath = storage_path("app/public/uploads/images/$date/" . basename($fakerFileName));

            $category->addMedia($mediaPath)
                ->toMediaCollection('images');
        }
    }
}
