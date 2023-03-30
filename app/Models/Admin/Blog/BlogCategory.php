<?php

namespace App\Models\Admin\Blog;

use Carbon\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogCategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title'];

    public function posts ()
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
