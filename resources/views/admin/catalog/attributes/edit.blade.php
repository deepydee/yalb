@extends('admin.layouts.layout')

@section('title', 'Каталог | Изменение аттрибута товара')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item active">Изменение аттрибута</li>
</ol>
@endsection

@section('main-content')

<section>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Создать аттрибут</h5>

                  <!-- Floating Labels Form -->
                  <form action="{{ route('admin.catalog.attributes.update', $attribute) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        id="floatingName"
                        placeholder="Название"
                        value="{{ $attribute->title }}">
                        <label for="floatingName">Название аттрибута</label>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Изменить</button>
                      <a href="{{ route('admin.catalog.attributes.index') }}" type="reset" class="btn btn-secondary">Отмена</a>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
