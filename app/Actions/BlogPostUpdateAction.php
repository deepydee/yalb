<?php

namespace App\Actions;

use App\Http\Requests\Admin\Blog\PostFormRequest;
use App\Models\Admin\Blog\BlogPost;

class BlogPostUpdateAction
{
    public function handle($post, PostFormRequest $request)
    {

        $data = $request->validated();

        $post->update($data);

        if ($request->hasFile('thumbnail')) {
            $post->clearMediaCollection('images');

            $post->addMediaFromRequest('thumbnail')
                 ->withResponsiveImages()
                 ->toMediaCollection('images');
        }

        $post->tags()->sync($request->tags);

    }
}
