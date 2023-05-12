<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use InteractsWithMedia;

    protected $fillable = [
        'code',
        'title',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
             ->useFallbackUrl(asset('assets/admin/img/placeholder-image.jpg'))
             ->useFallbackUrl(asset('assets/admin/img/placeholder-image.jpg'), 'thumb')
             ->useFallbackPath(asset('assets/admin/img/placeholder-image.jpg'))
             ->useFallbackPath(asset('assets/admin/img/placeholder-image.jpg'), 'thumb');

        $this->addMediaCollection('product_attribute_images')
            ->useFallbackUrl(asset('assets/admin/img/placeholder-image.jpg'));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(336)
            ->height(336)
            ->crop(Manipulations::CROP_RIGHT, 336, 336)
            ->nonQueued();
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)
            ->withPivot('value');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getCategories()
    {
        return $this->categories()
            ->get()
            ->pluck('title')
            ->join(', ');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['id', 'title'],
                'separator' => '-'
            ]
        ];
    }

    public function sluggableEvent(): string
    {
        /**
         * Default behaviour -- generate slug before model is saved.
         */
        return SluggableObserver::SAVED;
    }
}
