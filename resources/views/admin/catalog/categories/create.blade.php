@extends('admin.layouts.layout')

@section('title', 'Создание категории')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item active">Категории</li>
</ol>
@endsection

@section('main-content')

<section>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Создать категорию</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.catalog.categories.store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select @error('parent_id') is-invalid @enderror"
                                id="parent_id"
                                name="parent_id"
                                aria-label="Выберите категорию"
                            >
                                <option value="">Корневая категория</option>
                                @foreach ($categories as $id => $title)
                                    <option value="{{ $id }}" @selected(!@blank($category) && $id == $category->id) >{{ $title }}</option>
                                @endforeach
                            </select>
                            <label for="parent_id">Родительская категория</label>
                        </div>
                        <div class="form-floating">
                            <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            id="floatingName"
                            placeholder="Название">
                            <label for="floatingName">Название категории</label>
                        </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Создать</button>
                      <a href="{{ route('admin.catalog.categories.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
