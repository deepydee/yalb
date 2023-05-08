<?php

namespace App\Actions;

use App\Http\Requests\Admin\Blog\PostFormRequest;
use App\Models\Admin\Blog\BlogPost;

class BlogPostStoreAction
{
    public function handle(PostFormRequest $request)
    {

        $data = $request->validated();
        $status = $request->status;
        $isFeatured = $request->is_featured;

        if ($status === 'draft' && $isFeatured) {
            !$isFeatured;
        }

        $data = [
            ...$request->validated(),
            // 'thumbnail' => BlogPost::uploadImage($request),
            'status' => $status,
            'is_featured' => $isFeatured,
        ];

        $post = BlogPost::create($data);

        if ($request->hasFile('thumbnail')) {
            $post->addMediaFromRequest('thumbnail')
                 ->withResponsiveImages()
                 ->toMediaCollection('images');
        }

        $post->tags()->sync($request->tags);
    }
}
