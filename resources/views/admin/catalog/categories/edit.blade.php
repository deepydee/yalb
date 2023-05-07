@extends('admin.layouts.layout')

@section('title', 'Редактирование категории')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.catalog.categories.index') }}">Категории</a></li>
    <li class="breadcrumb-item active">Редактирование</li>
</ol>
@endsection

@push('scripts')
<script src="{{ asset('assets/admin/js/ckeditor.js') }}"></script>
@include('ckfinder::setup')
@endpush

@section('main-content')

<section>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Редактировать категорию</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.catalog.categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('PUT')
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
                                    <option value="{{ $id }}" @selected($id == $category->parent_id)>{{ $title }}</option>
                                @endforeach
                            </select>
                            <label for="parent_id">Родительская категория</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            id="floatingName"
                            placeholder="Название"
                            value="{{$category->title}}"
                            >
                            <label for="floatingName">Название категории</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Добавьте описание (необязательно)"
                                id="description"
                                name="description"
                                style="height: 100px;">{{$category->description}}</textarea>
                        </div>

                        <img src="{{ @blank($category->thumbnail) ? asset('assets/admin/img/placeholder-image.jpg') : asset("storage/uploads/{$category->thumbnail}") }}" class="img-thumbnail mb-3" width="100" alt="{{ $category->title }}">

                        <div class="input-group custom-file-button mb-3">
                            <input class="form-control custom-file-input hidden" title="Выберите изображение" type="file" name="thumbnail" id="thumbnail" >
                            <label class="input-group-text" for="thumbnail">
                              Выбрать изображение
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Редактировать</button>
                      <a href="{{ route('admin.catalog.categories.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
