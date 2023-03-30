@extends('admin.layouts.layout')

@section('title', 'Редактирование статьи')

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
            toolbar: [ 'heading', 'blockQuote', '|', 'bold', 'italic', 'underline', 'strikethrough', 'code', 'subscript', 'superscript', '|', 'undo', 'redo' ]
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
                  <h5 class="card-title">Редактирование статьи "{{ $post->title }}"</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.blog.posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            value="{{ $post->title }}">
                        <label for="title">Название</label>
                      </div>

                      <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Добавьте описание"
                            id="description"
                            name="description"
                            style="height: 100px;">{{ $post->description }}</textarea>
                      </div>

                      <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('content') is-invalid @enderror"
                            placeholder="Текст статьи"
                            id="content"
                            name="content"
                            style="height: 100px;">{{ $post->content }}</textarea>
                      </div>

                      <div class="form-floating mb-3">
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" aria-label="Выберите категорию">
                          @foreach ($categories as $id => $title)
                              <option value="{{ $id }}" @if ($id === $post->category_id) selected @endif>{{ $title }}</option>
                          @endforeach
                        </select>
                        <label for="category_id">Выберите категорию</label>
                      </div>

                      <div class="form-floating mb-3">
                        <select class="form-select" id="tags" name="tags[]" placeholder="Выберите теги" multiple>
                            @foreach ($tags as $id => $title)
                                 <option value="{{ $id }}" @if (in_array($id, $post->tags->pluck('id')->all())) selected @endif>{{ $title }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="input-group custom-file-button mb-3">
                        <input class="form-control custom-file-input hidden" title="Выберите изображение" type="file" name="thumbnail" id="thumbnail" >
                        <label class="input-group-text" for="thumbnail">
                          Выбрать изображение
                        </label>
                      </div>

                      <img src="{{ @blank($post->thumbnail) ? asset('assets/admin/img/placeholder-image.jpg') : asset("storage/uploads/{$post->thumbnail}") }}" class="img-thumbnail" width="100" alt="{{ $post->title }}">

                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Обновить</button>
                      <a href="{{ route('admin.blog.posts.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>
@endsection
