@extends('admin.layouts.layout')

@section('title', 'Статьи')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Блог</li>
    <li class="breadcrumb-item active">Статьи</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12">
        <div class="card-body">
            <h5 class="card-title">Список статей</h5>

            <a href="{{ route('admin.blog.posts.create') }}"
            class="btn btn-outline-primary mb-4">Добавить</a>

            @if (count($posts))
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Теги</th>
                    <th scope="col">Дата публикации</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>@if ($post->isPublic()) <a href="{{ route('blog.page', $post->slug) }}" target="_blank">{{ $post->title }}</a> @else {{ $post->title }} @endif</td>
                        <td><img src="{{ $post->getFirstMediaUrl('images', 'thumb') }}" class="img-thumbnail" width="100" alt="{{ $post->title }}"></td>
                        <td>{{ $post->category->title }}</td>
                        <td>{!! $post->tags->pluck('title')->map(fn(string $tag) => "<span class='badge bg-info text-white'>{$tag}</span>")->join(' ') !!}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->getStatus() }} @if ($post->is_featured), в рекомендовынных @endif</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.blog.posts.edit', ['post' => $post->id]) }}" class="btn btn-outline-secondary border-0" title="Редактировать"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.blog.posts.destroy', ['post' => $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger border-0" title="Удалить" onclick="return confirm('Вы действительно хотите удалить статью?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
              </table>

              {{ $posts->links('vendor.pagination.bootstrap-5') }}
            @else
                <p>Нет статей</p>
            @endif

          </div>
       </div>
    </div>
  </section>

@endsection
