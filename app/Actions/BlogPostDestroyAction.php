<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;

class BlogPostDestroyAction
{
    public function handle($post)
    {
        $post->tags()->sync([]);

        if ($post->thumbnail) {
            Storage::delete($post->thumbnail);
        }

        $post->delete();
    }
}
