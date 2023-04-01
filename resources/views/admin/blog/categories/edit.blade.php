@extends('admin.layouts.layout')

@section('title', 'Редактирование категории')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Блог</li>
    <li class="breadcrumb-item active">Категории</li>
</ol>
@endsection

@section('main-content')

<section>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Редактировать категорию "{{ $category->title }}"</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.blog.categories.update', ['category' => $category->id]) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        id="floatingName"
                        value="{{ $category->title }}">
                        <label for="floatingName">Название категории</label>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Редактировать</button>
                      <a href="{{ route('admin.blog.categories.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
