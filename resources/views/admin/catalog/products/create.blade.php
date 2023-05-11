@extends('admin.layouts.layout')

@section('title', 'Создание товара')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.catalog.products.index') }}">Товары</a></li>
    <li class="breadcrumb-item active">Создание</li>
</ol>
@endsection

@include('admin.layouts.chunks.ckeditor')

@section('main-content')

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<script>
    const multipleCancelButton = new Choices('#attributes', {
        removeItemButton: true,
    });

    const attributesSelect = document.getElementById('attributes');

    attributesSelect.addEventListener('change', (event) => {
        let selectedOptions = [];
        const options = event.target.options;

        selectedOptions = [...options]
            .filter(option => option.selected)
            .map(option => option.value);

        const attributes = document.querySelectorAll('.attribute');

        [...attributes].forEach(attribute =>
            attribute.hidden = !selectedOptions.includes(attribute.id));
    });

</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css"/>
@endpush

<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Создать товар</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.catalog.products.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select @error('category') is-invalid @enderror"
                                id="category"
                                name="category"
                                aria-label="Выберите категорию"
                            >
                                @foreach ($categories as $id => $title)
                                    <option value="{{ $id }}">{{ $title }}</option>
                                @endforeach
                            </select>
                            <label for="parent_id">Категория</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="attributes" name="attributes[]" placeholder="Выберите аттрибуты" multiple>
                                @foreach ($attributes as $attribute)
                                     <option value="{{ $attribute->id }}" @if (old('attributes')) @selected(in_array($attribute->id, old('attributes'))) @endif>{{ $attribute->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach ($attributes as $attribute)
                        @if ($attribute->type->name === 'Text')
                        <div class="form-floating mb-3 attribute" id="{{ $attribute->id }}" hidden>
                            <input
                                type="text"
                                name="values[{{ $attribute->id }}]"
                                class="form-control @error('{{ $attribute->title }}') is-invalid @enderror"
                                id="{{ $attribute->id }}"
                                placeholder="{{ $attribute->title }}"
                                value="{{ old($attribute->title) }}">
                            <label for="title">{{ $attribute->title }}</label>
                        </div>
                        @endif
                        @if ($attribute->type->name === 'Image')
                        <div class="input-group custom-file-button mb-3 attribute" id="{{ $attribute->id }}" hidden>
                            <input class="form-control custom-file-input hidden" title="Выберите изображение" type="file" name="values[{{ $attribute->id }}]">
                            <label class="input-group-text" for="{{ $attribute->id }}">
                              Выбрать изображение
                            </label>
                        </div>
                        @endif
                        @endforeach

                        <div class="form-floating mb-3">
                            <textarea
                                class="form-control @error('content') is-invalid @enderror"
                                placeholder="Добавьте описание (необязательно)"
                                id="content"
                                name="description"
                                style="height: 100px;">{{ old('content') }}</textarea>
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
                      <a href="{{ route('admin.catalog.products.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
