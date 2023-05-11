@extends('admin.layouts.layout')

@section('title', 'Товары')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item active">Товары</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12">
        <div class="card-body">
            <h5 class="card-title">Список товаров</h5>

            <a href="{{ route('admin.catalog.products.create') }}"
            class="btn btn-outline-primary mb-4">Добавить</a>

            @if (count($products))
            {{-- @dd($products) --}}
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Код</th>
                    <th scope="col">Категория</th>
                     <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><a href="{{ route('products.show', ['category_path' => $product->categories->first()->path, 'product' => $product]) }}" target="_blank">{{ $product->title }}</a></td>
                        <td><img src="{{ $product->getFirstMediaUrl('images', 'thumb') }}" class="img-thumbnail" width="100" alt="{{ $product->title }}"></td>
                        <td>{{ $product->code }}</td>
                        <td><a href="{{ route('category.show', ['path' => $product->categories->first()->path]) }}" target="_blank">{{ $product->categories->first()->title }}</a></td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.catalog.products.edit', $product) }}" class="btn btn-outline-secondary border-0" title="Редактировать"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.catalog.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger border-0" title="Удалить" onclick="return confirm('Вы действительно хотите удалить товар?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
              </table>

              {{ $products->links('vendor.pagination.bootstrap-5') }}
            @else
                <p>Нет товаров</p>
            @endif

          </div>
       </div>
    </div>
  </section>

@endsection
