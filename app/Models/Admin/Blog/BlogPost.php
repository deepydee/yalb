<?php

namespace App\Models\Admin\Blog;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Date;
use Illuminate\Database\Eloquent\Builder;
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
        'status',
        'is_featured',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
       return $this->hasMany(BlogPostComment::class)
        ->orderBy('created_at');
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

    public function getHumanReadableCreatedAt() {
        return Date::parse($this->created_at)->format('j F Y');
    }

    public function getHumanReadableUpdatedAt() {
        return Date::parse($this->updated_at)->format('j F Y');
    }

    public function scopeSearch(Builder $query, $q)
    {
        return $query->where('title', 'LIKE', "%{$q}%")
        ->orWhereFullText('content', $q);
    }

    public function setDraft()
    {
        $this->status = 'draft';
        $this->save();
    }

    public function setPublic()
    {
        $this->status = 'publushed';
        $this->save();
    }

    public function toggleStatus()
    {
        $this->status = $this->status === 'publushed' ?
            $this->setDraft() :
            $this->setPublic();
    }

    public function getStatus(): string
    {
        return $this->status === 'published' ?
            'Опубликовано' :
            'Черновик';
    }
}
