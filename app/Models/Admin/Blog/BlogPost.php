<?php

namespace App\Models\Admin\Blog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Date;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category_id',
        'thumbnail',
    ];

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class)
                    ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
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

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }

            $folder = date('Y-m-d');
           return $request->file('thumbnail')->store("images/{$folder}");
        }

        return null;
    }

    public function getImage()
    {
        return $this->thumbnail ?
            asset("storage/uploads/{$this->thumbnail}") :
            asset('assets/admin/img/placeholder-image.jpg');
    }

    // protected function createdAt(): Attribute
    // {
    //     return Attribute::make(
    //         // get: fn (string $value) => Carbon::parse($value)->format('l j F Y H:i:s'),
    //         get: fn (string $value) => Date::parse($value)->format('j F Y'),
    //     );
    // }

    public function getHumanReadableCreatedAt() {
        return Date::parse($this->created_at)->format('j F Y');
    }

    // protected function updatedAt(): Attribute
    // {
    //     return Attribute::make(
    //         // get: fn (string $value) => Carbon::parse($value)->format('l j F Y H:i:s'),
    //         get: fn (string $value) => Date::parse($value)->format('j F Y'),
    //     );
    // }

    public function getHumanReadableUpdatedAt() {
        return Date::parse($this->updated_at)->format('j F Y');
    }
}
