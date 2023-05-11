<?php

namespace App\Enums;

enum AttributeType: string
{
    case Text = 'Текст';
    case Image = 'Изображение';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
