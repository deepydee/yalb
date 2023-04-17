@extends('admin.layouts.layout')

@section('title', 'Сообщение')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Блог</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.blog.comments.index') }}">Комментарии</a></li>
    <li class="breadcrumb-item active">{{ \Illuminate\Support\Str::limit($comment->text, 10, $end='...') }}</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12">
        <div class="card-body">
            <h5 class="card-title">Пользователь {{ $comment->user->name }} пишет под статьей {{ $comment->post->title }}</h5>
            <p>
                {{ $comment->text }}
            </p>
          </div>
       </div>
    </div>
  </section>
@endsection
