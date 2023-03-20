@extends('admin.layouts.layout')

@section('title', 'Редактирование категории')


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
