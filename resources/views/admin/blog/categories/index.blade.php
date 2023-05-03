@extends('admin.layouts.layout')

@section('title', 'Категории')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Блог</li>
    <li class="breadcrumb-item active">Категории</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12 col-xl-6">
        <div class="card-body">
            <h5 class="card-title">Список категорий</h5>

            <a href="{{ route('admin.blog.categories.create') }}"
            class="btn btn-outline-primary mb-4">Добавить</a>

            @if (count($categories))
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Слаг</th>
                    <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.blog.categories.edit', ['category' => $category->id]) }}" class="btn btn-outline-secondary border-0" title="Редактировать"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.blog.categories.destroy', ['category' => $category->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger border-0" title="Удалить" onclick="return confirm('Вы действительно хотите удалить категорию?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
              </table>

              {{ $categories->links('vendor.pagination.bootstrap-5') }}
            @else
                <p>Нет категорий</p>
            @endif

          </div>
       </div>
    </div>
  </section>
@endsection
