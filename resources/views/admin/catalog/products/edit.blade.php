@extends('admin.layouts.layout')

@section('title', 'Редактирование товара')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.catalog.products.index') }}">Товары</a></li>
    <li class="breadcrumb-item active">Изменение</li>
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
                  <h5 class="card-title">Обновить товар</h5>
                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.catalog.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select @error('category') is-invalid @enderror"
                                id="category"
                                name="category"
                                aria-label="Выберите категорию"
                            >
                                @foreach ($categories as $id => $title)
                                    <option value="{{ $id }}"  @if ($id === $product->categories->first()->id) selected @endif>{{ $title }}</option>
                                @endforeach
                            </select>
                            <label for="parent_id">Категория</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                placeholder="Название"
                                value="{{ $product->title }}">
                            <label for="title">Название</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                name="code"
                                class="form-control @error('code') is-invalid @enderror"
                                id="code"
                                placeholder="Код"
                                value="{{ $product->code }}">
                            <label for="title">Код</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="attributes" name="attributes[]" placeholder="Выберите аттрибуты" multiple>
                                @foreach ($attributes as $attribute)
                                     <option value="{{ $attribute->id }}" @if (in_array($attribute->id, $product->attributes->pluck('id')->all())) selected @endif>{{ $attribute->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @dd($product->attributes[0]->pivot->value) --}}

                        @foreach ($product->attributes as $attribute)
                        @if ($attribute->type->name === 'Text')
                        <div class="form-floating mb-3 attribute" id="{{ $attribute->id }}" @if (! in_array($attribute->id, $product->attributes->pluck('id')->all())) hidden @endif>
                            <input
                                type="text"
                                name="values[{{ $attribute->id }}]"
                                class="form-control @error('values[{{ $attribute->id }}]') is-invalid @enderror"
                                id="{{ $attribute->id }}"
                                placeholder="{{ $attribute->title }}"
                                value="{{ $attribute->pivot->value }}">
                            <label for="title">{{ $attribute->title }}</label>
                        </div>
                        @endif
                        @if ($attribute->type->name === 'Image')
                        <figure>
                            <img src="{{ $product->getFirstMediaUrl('product_attribute_images', 'thumb') }}" class="img-thumbnail mb-3" width="600" alt="{{ $attribute->title }}">
                            <figcaption>{{ $attribute->title }}</figcaption>
                        </figure>
                        <div class="input-group custom-file-button mb-3 attribute" id="{{ $attribute->id }}" @if (! in_array($attribute->id, $product->attributes->pluck('id')->all())) hidden @endif>
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
                                placeholder="Добавьте описание"
                                id="content"
                                name="description"
                                style="height: 100px;">{{ $product->description }}</textarea>
                        </div>

                        <figure>
                            <img src="{{ $product->getFirstMediaUrl('images', 'thumb') }}" class="img-thumbnail mb-3" width="100" alt="{{ $product->title }}">
                            <figcaption>Основное изображение</figcaption>
                        </figure>

                        <div class="input-group custom-file-button">
                            <input class="form-control custom-file-input hidden" title="Выберите изображение" type="file" name="thumbnail" id="thumbnail" >
                            <label class="input-group-text" for="thumbnail">
                              Выбрать изображение
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Изменить</button>
                      <a href="{{ route('admin.catalog.products.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
