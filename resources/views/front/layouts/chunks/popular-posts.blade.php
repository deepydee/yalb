<div class="row gy-2 gy-sm-4">
    @if ($popularPosts)
        @foreach ($popularPosts as $post)
        <div class="col-md-6 col-lg-4">
            @include('front.layouts.chunks.post-card', ['post' => $post])
        </div>
        @endforeach
    @endif
</div>
