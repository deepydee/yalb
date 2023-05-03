<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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

        foreach ($categories as $category) {
            $category
                ->generatePath()
                ->save();
        }
    }
}
