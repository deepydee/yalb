@extends('admin.layouts.layout')

@section('title', 'Сообщение')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.messages.index') }}">Сообщения</a></li>
    <li class="breadcrumb-item active">{{ $message->id }}</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12">
        <div class="card-body">
            <h5 class="card-title">Пользователь {{ $message->name }} (телефон {{ $message->phone }}) пишет</h5>
            <p>
                {{ $message->message }}
            </p>
          </div>
       </div>
    </div>
  </section>
@endsection
