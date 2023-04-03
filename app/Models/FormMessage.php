<?php

namespace App\Models;

use Date;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'name',
        'message',
    ];

    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn (?string $phone) => $phone === null ?
                'Нет телефона' :
                $phone,
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (?string $name) => $name === null ?
                'Без имени' :
                $name,
        );
    }

    public function getCreatedAt()
    {
        return Date::parse($this->created_at)->diffForHumans();
    }
}
