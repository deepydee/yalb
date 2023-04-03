@extends('admin.layouts.layout')

@section('title', 'Новая статья')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Блог</li>
    <li class="breadcrumb-item active">Статьи</li>
</ol>
@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
@include('ckfinder::setup')

<script>
    const multipleCancelButton = new Choices('#tags', {
        removeItemButton: true,
        // maxItemCount:5,
        // searchResultLimit:5,
        // renderChoiceLimit:5
    });

    ClassicEditor
        .create( document.querySelector( '#description' ), {
            ckfinder: {
                // To avoid issues, set it to an absolute path that does not start with dots, e.g. '/ckfinder/core/php/(...)'
                uploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files&responseType=json'
            },
            toolbar: [ 'heading', 'blockQuote', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
        } )
        .then( function( editor ) {
            // console.log( editor );
        } )
        .catch( function( error ) {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#content' ), {
            ckfinder: {
                // To avoid issues, set it to an absolute path that does not start with dots, e.g. '/ckfinder/core/php/(...)'
                uploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files&responseType=json'
            },
            //toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
        } )
        .then( function( editor ) {
            // console.log( editor );
        } )
        .catch( function( error ) {
            console.error( error );
        } );

    const statusCheck = document.getElementById('status');
    const featuredCheck = document.getElementById('featured');

    statusCheck.addEventListener('change', (event) => {
        if (!event.currentTarget.checked) {
            featuredCheck.checked = false;
            featuredCheck.disabled = true;
        } else {
            featuredCheck.disabled = false;
        }
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

.ck {
    --ck-border-radius: 0.375rem;
}


.ck-editor__editable_inline {
    min-height: 400px;
}
</style>
@endpush


@section('main-content')
<section>
    <div class="row">
        <div class="col-12">
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
                            placeholder="Название"
                            value="{{ old('title') }}">
                        <label for="title">Название</label>
                      </div>

                      <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Добавьте описание"
                            id="description"
                            name="description"
                            style="height: 100px;">{{ old('description') }}</textarea>
                      </div>

                      <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('content') is-invalid @enderror"
                            placeholder="Текст статьи"
                            id="content"
                            name="content"
                            >{{ old('content') }}</textarea>
                      </div>

                      <div class="form-floating mb-3">
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" aria-label="Выберите категорию">
                          @foreach ($categories as $id => $title)
                              <option value="{{ $id }}" @selected($id == old('category_id'))>{{ $title }}</option>
                          @endforeach
                        </select>
                        <label for="category_id">Выберите категорию</label>
                      </div>

                      <div class="form-floating mb-3">
                        <select class="form-select" id="tags" name="tags[]" placeholder="Выберите теги" multiple>
                            @foreach ($tags as $id => $title)
                                 <option value="{{ $id }}" @if (old('tags')) @selected(in_array($id, old('tags'))) @endif>{{ $title }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="status" name="status" {{ old('status') == 'on' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Опубликовать</label>
                      </div>

                      <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="featured" name="is_featured" disabled {{ old('is_featured') == 'on' ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">В рекомендованные</label>
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
