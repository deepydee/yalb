<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use Sluggable, NodeTrait {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }

    protected $fillable = [
        'title',
        'parent_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * If u call both replicate methods u will end with three objects instead of two.
     * U have to manually overwrite replicate method.
     */
    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);
        (new SlugService())->slug($instance, true);

        return $instance;
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function getUrl()
    {
        $slugs = $this->ancestors()->pluck('slug')->all();
        $slugs[] = $this->slug;

        return implode('/', $slugs);
    }

    public function getChildrenOrdered()
    {
        return $this->children()->defaultOrder()->get();
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
