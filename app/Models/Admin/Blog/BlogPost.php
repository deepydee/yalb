<?php

namespace App\Models\Admin\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Date;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BlogPost extends Model implements HasMedia
{
    use HasFactory, Sluggable;
    use InteractsWithMedia;

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
        ->where('is_published', 1)
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
             ->withResponsiveImages()
             ->useFallbackUrl(asset('assets/admin/img/placeholder-image.jpg'))
             ->useFallbackUrl(asset('assets/admin/img/placeholder-image.jpg'), 'thumb')
             ->useFallbackPath(asset('assets/admin/img/placeholder-image.jpg'))
             ->useFallbackPath(asset('assets/admin/img/placeholder-image.jpg'), 'thumb');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 300, 300);
    }

    public function getImageAttribute()
    {
        return $this->getMedia('images')->last();
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

    public function isPublic()
    {
        return $this->status === 'published';
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
