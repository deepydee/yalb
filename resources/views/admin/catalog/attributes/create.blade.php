@extends('admin.layouts.layout')

@section('title', 'Каталог | Создание атрибута товара')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item active">Создание атрибута</li>
</ol>
@endsection

@section('main-content')

<section>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Создать атрибут</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.catalog.attributes.store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        id="floatingName"
                        placeholder="Название">
                        <label for="floatingName">Название атрибута</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select
                            class="form-select @error('type') is-invalid @enderror"
                            id="type"
                            name="type"
                            aria-label="Выберите атрибут"
                        >
                            @foreach (App\Enums\AttributeType::values() as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <label for="type">Тип атрибута</label>
                    </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Создать</button>
                      <a href="{{ route('admin.catalog.attributes.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
