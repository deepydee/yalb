<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [   'code' => 'K68',
                'title' => 'K68 - Направляющее кольцо штока',
                'description' => 'K68 - это армированное стекловолокном направляющее кольцо POM, предназначенное для общего назначения в гидравлических системах. Состав стекловолокна в материале повышает несущую способность направляющего элемента.',
                'thumb' => 'product-images/K69_Kesit.png',
                'category' => 'Направляющие элементы'
            ],
            [   'code' => 'K69',
                'title' => 'K69 - Направляющее кольцо поршня',
                'description' => 'K69 - это направляющее кольцо из POM, армированное стекловолокном, предназначенное для общего применения в гидравлических системах. Состав стекловолокна в материале увеличивает несущую способность направляющего элемента.',
                'thumb' => 'product-images/K70_Kesit.png',
                'category' => 'Направляющие элементы'
            ],
            [   'code' => 'K114',
                'title' => 'K114 - Уплотнение штока поршня',
                'description' => 'Уплотнение поршня-шатуна K114 - это уплотнительный элемент одностороннего действия, который благодаря симметричной конструкции может работать как на поршне, так и на штоке.',
                'thumb' => 'product-images/K114.png',
                'category' => 'Гидравлические уплотнительные элементы поршня-штока'
            ],
            [   'code' => 'K21',
                'title' => 'K21 - Уплотнение штока поршня',
                'description' => 'K21 - это симметричная u-образная чашка одностороннего действия, которая может быть изготовлена из полиуретана или эластомера и может использоваться в поршневых или штоковых механизмах. Он рекомендуется для использования в цилиндрах, рассчитанных на легкие нагрузки.',
                'thumb' => 'product-images/K21_Kesit.png',
                'category' => 'Гидравлические уплотнительные элементы поршня-штока'
            ],
            [   'code' => 'K94',
                'title' => 'K94 - Грязесъемник',
                'description' => 'K94 - это стеклоочиститель из ТПУ с дополнительной уплотнительной кромкой. От обычных очистителей отличается тем, что дополнительная статическая уплотнительная кромка предотвращает попадание грязи и водяных брызг.',
                'thumb' => 'product-images/K94_Kesit.png',
                'category' => 'Грязесъемники'
            ],
        ];

        foreach ($products as $product) {

            $slug = SlugService::createSlug(
                Category::class,
                'slug',
                $product['category'],
                ['unique' => false],
            );

            unset($product['category']);

            Product::factory()
                ->create($product)
                ->categories()
                ->sync(Category::whereSlug($slug)->first());
        }
    }
}
