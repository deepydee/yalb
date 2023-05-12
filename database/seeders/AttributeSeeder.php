<?php

namespace Database\Seeders;

use App\Enums\AttributeType;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['title' => 'Преимущества', 'type' => AttributeType::Text],
            ['title' => 'Область применения', 'type' => AttributeType::Text],
            ['title' => 'Материал', 'type' => AttributeType::Text],
            ['title' => 'Давление (макс), БАР', 'type' => AttributeType::Text],
            ['title' => 'Температура (макс), °C', 'type' => AttributeType::Text],
            ['title' => 'Скорость скольжения (макс), м/с', 'type' => AttributeType::Text],
            ['title' => 'Скорость скольжения (макс), м/с', 'type' => AttributeType::Text],
            ['title' => 'Чертеж', 'type' => AttributeType::Image],
        ];

        $values = [
            [
                'code' => 'K68',
                'benefits' => '- Простота установки<br> - Высокая стабильность формы в диапазоне рабочих температур<br> - Широкий размерный ряд',
                'area' => '- Сельскохозяйственная техника<br> - Мобильная техника<br> - Промышленные цилиндры<br> - Цилиндры для легких и средних условий эксплуатации',
                'material' => 'POM',
                'max_pressure' => null,
                'max_temp' => '-40/+110',
                'sliding_speed' => '1.0',
                'tech_drawing' => 'product-images/technical-drawing/K68.png',
            ],
            [
                'code' => 'K69',
                'benefits' => '- Простая установка<br> - Высокая стабильность формы в диапазоне рабочих температур<br> - Широкий размерный ряд',
                'area' => '- Сельскохозяйственная техника<br> - Мобильная техника<br> - Промышленные цилиндры<br> - Легкие и средние цилиндры',
                'material' => 'POM',
                'max_pressure' => null,
                'max_temp' => '-40/+110',
                'sliding_speed' => '1.0',
                'tech_drawing' => 'product-images/technical-drawing/K69.png',
            ],
            [
                'code' => 'K114',
                'benefits' => '- Простота установки<br> - Высокая стабильность формы в диапазоне рабочих температур<br> - Широкий размерный ряд',
                'area' => '- Сельскохозяйственная техника<br> - Мобильная техника<br> - Промышленные цилиндры<br> - Цилиндры для легких и средних условий эксплуатации',
                'material' => 'POM',
                'max_pressure' => null,
                'max_temp' => '-40/+110',
                'sliding_speed' => '1.0',
                'tech_drawing' => 'product-images/technical-drawing/K114.png',
            ],
            [
                'code' => 'K21',
                'benefits' => '- Простота установки<br> - Высокая стабильность формы в диапазоне рабочих температур<br> - Широкий размерный ряд',
                'area' => '- Сельскохозяйственная техника<br> - Мобильная техника<br> - Промышленные цилиндры<br> - Цилиндры для легких и средних условий эксплуатации',
                'material' => 'POM',
                'max_pressure' => null,
                'max_temp' => '-40/+110',
                'sliding_speed' => '1.0',
                'tech_drawing' => 'product-images/technical-drawing/K21.png',
            ],
            [
                'code' => 'K94',
                'benefits' => '- Простота установки<br> - Высокая стабильность формы в диапазоне рабочих температур<br> - Широкий размерный ряд',
                'area' => '- Сельскохозяйственная техника<br> - Мобильная техника<br> - Промышленные цилиндры<br> - Цилиндры для легких и средних условий эксплуатации',
                'material' => 'POM',
                'max_pressure' => null,
                'max_temp' => '-40/+110',
                'sliding_speed' => '1.0',
                'tech_drawing' => 'product-images/technical-drawing/K94.png',
            ],
        ];

        foreach ($attributes as $attribute) {
            Attribute::updateOrCreate($attribute);
        }

        foreach ($values as $value) {
            $code = $value['code'];

            Product::whereCode($code)
                ->firstOrFail()
                ->attributes()
                ->sync([
                    1 => [ 'value' => $value['benefits'] ],
                    2 => [ 'value' => $value['area'] ],
                    3 => [ 'value' => $value['material'] ],
                    4 => [ 'value' => $value['max_pressure'] ],
                    5 => [ 'value' => $value['max_temp'] ],
                    6 => [ 'value' => $value['sliding_speed'] ],
                    7 => [ 'value' => $value['tech_drawing'] ],
                ]);
        }
    }
}
