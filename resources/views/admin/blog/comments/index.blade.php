@extends('admin.layouts.layout')

@section('title', 'Комментарии')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Блог</li>
    <li class="breadcrumb-item active">Комментарии</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12">
        <div class="card-body">
            <h5 class="card-title">Комментарии к статьям</h5>

            @if (count($comments))
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Статья</th>
                    <th scope="col">Комментарий</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $comment->user->name }}</td>
                        <td><a href="{{ route('blog.page', $comment->post->slug) }}" target="_blank">{{ $comment->post->title }}</a></td>
                        <td>
                            <a href="{{ route('admin.blog.comments.single', $comment->id) }}">
                                {{ \Illuminate\Support\Str::limit($comment->text, 50, $end='...') }}
                            </a>
                        </td>
                        <td>{{ $comment->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.blog.comments.publish',  $comment->id) }}" title="{{$comment->isPublic() ? 'Снять с публикации' : 'Опубликовать'}}"><i class="bi bi-eye{{$comment->isPublic() ? '' : '-slash'}}"></i></a>
                            <form action="{{ route('admin.blog.comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger border-0" title="Удалить" onclick="return confirm('Вы действительно хотите удалить сообщение?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
              </table>

              {{ $comments->links('vendor.pagination.bootstrap-5') }}
            @else
                <p>Нет комментариев...</p>
            @endif

          </div>
       </div>
    </div>
  </section>
@endsection
