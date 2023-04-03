<?php

namespace App\Models\Admin\Blog;

use Date;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Date::parse($value)->format('j F Y в H:i'),
        );
    }
}
