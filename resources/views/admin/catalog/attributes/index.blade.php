@extends('admin.layouts.layout')

@section('title', 'Каталог | Аттрибуты товара')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item">Каталог</li>
    <li class="breadcrumb-item active">Аттрибуты</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12 col-xl-6">
        <div class="card-body">
            <h5 class="card-title">Список аттрибутов товара</h5>

            <a href="{{ route('admin.catalog.attributes.create') }}"
            class="btn btn-outline-primary mb-4">Добавить</a>

            {{-- <a href="{{ route('admin.export', ['model' => 'App\Models\Attribute']) }}"
            class="btn btn-outline-primary mb-4">Экспорт</a>

            <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="model" value="App\Models\Attribute">
                <input type="file" name="file" required>
                <button class="btn btn-outline-primary mb-4" title="Импорт" type="submit" >Импорт</button>
            </form> --}}

            @if (count($attributes))
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                      <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($attributes as $attribute)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $attribute->title }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.catalog.attributes.edit', $attribute) }}" class="btn btn-outline-secondary border-0" title="Редактировать"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.catalog.attributes.destroy', $attribute) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger border-0" title="Удалить" onclick="return confirm('Вы действительно хотите удалить аттрибут?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
              </table>

              {{ $attributes->links('vendor.pagination.bootstrap-5') }}
            @else
                <p>Нет аттрибутов</p>
            @endif

          </div>
       </div>
    </div>
  </section>
@endsection
