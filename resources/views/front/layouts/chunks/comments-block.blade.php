<div class="container">
    <div class="row justify-content-center">
      <aside class="col-12 col-xl-6 be-comment-block">
        <h3 class="comments-title mb-5">Комментарии ({{$post->comments->count()}})</h3>

        @if ($post->comments->count())
            @foreach ($post->comments as $comment)
                @include('front.layouts.chunks.comment', $comment)
            @endforeach
        @endif


        <form action="{{ route('blog.comment', $post->id) }}" class="form-block" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <textarea class="form-control be-comment-textarea @error('text') is-invalid @enderror" placeholder="Оставьте комментарий" id="comment" name="text" required></textarea>
            <label for="comment">Комментарий</label>
            @error('text')
            <div class="alert alert-danger mt-3">
                {{ $message }}
            </div>
            @enderror
            <div id="commentHelp" class="form-text">Комментарии могут оставлять только зарегистрированные пользователи</div>
          </div>

          <input class="btn btn-outline-primary" type="submit" name="submitComment" id="submitComment" value="Отправить">

        </form>
      </aside>
    </div>
</div>
