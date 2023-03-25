@extends('admin.layouts.layout')

@section('title', 'Новая статья')

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script>
    const multipleCancelButton = new Choices('#tags', {
        removeItemButton: true,
        // maxItemCount:5,
        // searchResultLimit:5,
        // renderChoiceLimit:5
    });
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css"/>

<style>
.custom-file-button input[type=file]::-webkit-file-upload-button {
  display: none;
}
.custom-file-button input[type=file]::file-selector-button {
  display: none;
}
.custom-file-button:hover label {
  background-color: #dde0e3;
  cursor: pointer;
}

.choices__inner {
    background-color: #fff;
    padding: 7.5px 7.5px 3.75px;
    border-radius: 0.375rem;
    font-size: 1rem;
    overflow: hidden;
}

.choices__input {
    background-color: #fff;
}
</style>
@endpush


@section('main-content')

<section>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Новая статья</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.blog.posts.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            placeholder="Название">
                        <label for="title">Название</label>
                      </div>

                      <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Добавьте описание"
                            id="description"
                            name="description"
                            style="height: 100px;"></textarea>

                        <label for="description">Описание</label>
                      </div>

                      <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('content') is-invalid @enderror"
                            placeholder="Текст статьи"
                            id="content"
                            name="content"
                            style="height: 100px;"></textarea>

                        <label for="content">Текст статьи</label>
                      </div>

                      <div class="form-floating mb-3">
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" aria-label="Выберите категорию">
                          @foreach ($categories as $id => $title)
                              <option value="{{ $id }}">{{ $title }}</option>
                          @endforeach
                        </select>
                        <label for="category_id">Выберите категорию</label>
                      </div>

                      <div class="form-floating mb-3">
                        <select class="form-select" id="tags" name="tags[]" placeholder="Выберите теги" multiple>
                            @foreach ($tags as $id => $title)
                                 <option value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="input-group custom-file-button">
                        <input class="form-control custom-file-input hidden" title="Выберите изображение" type="file" name="thumbnail" id="thumbnail" >
                        <label class="input-group-text" for="thumbnail">
                          Выбрать изображение
                        </label>
                      </div>

                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Создать</button>
                      <a href="{{ route('admin.blog.posts.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
