<?php

namespace App\Models;

use App\Http\Requests\Admin\Catalog\CategoryRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
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
        'description',
        'thumbnail',
        'path',
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

    protected static function booted(): void
    {
        static::saving(function (self $model) {
            if ($model->isDirty('slug', 'parent_id')) {
                $model->generatePath();
            }
        });

        static::saved(function (self $model) {
            // Данная переменная нужна для того, чтобы потомки не начали вызывать
            // метод, т.к. для них путь также изменится
            static $updating = false;

            if ( ! $updating && $model->isDirty('path')) {
                $updating = true;

                $model->updateDescendantsPaths();

                $updating = false;
            }
        });
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function getUrl()
    {
        // $slugs = $this->ancestors()->pluck('slug')->all();
        // $slugs[] = $this->slug;

        // return implode('/', $slugs);

        return $this->path;
    }

    public function generatePath()
    {
        $slug = $this->slug;
        $this->path = $this->isRoot() ? $slug : $this->parent->path.'/'.$slug;

        return $this;
    }

    public function updateDescendantsPaths()
    {
        // Получаем всех потомков в древовидном порядке
        $descendants = $this->descendants()->defaultOrder()->get();

        // Данный метод заполняет отношения parent и children
        $descendants->push($this)->linkNodes()->pop();

        foreach ($descendants as $model) {
            $model->generatePath()->save();
        }
    }

    public function getChildrenOrdered()
    {
        return $this->children()->defaultOrder()->get();
    }

    public static function uploadImage(CategoryRequest $request, $image = null)
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
