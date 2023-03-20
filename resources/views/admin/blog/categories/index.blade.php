@extends('admin.layouts.layout')

@section('title', 'Категории')

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12 col-xl-6">
        <div class="card-body">
            <h5 class="card-title">Список категорий</h5>

            {{-- <button
                class="btn btn-outline-primary mb-4"
                data-bs-toggle="modal"
                data-bs-target="#addBlogCategoryModal">
                Добавить
            </button> --}}

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
                        <th scope="row">{{ $category->id }}</th>
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

  <div id="addBlogCategoryModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Добавление категории</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
          <button type="button" class="btn btn-primary">Добавить</button>
        </div>
      </div>
    </div>
  </div>
@endsection
