@extends('admin.layouts.layout')

@section('title', 'Сообщения')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Администратор</a></li>
    <li class="breadcrumb-item active">Сообщения</li>
</ol>
@endsection

@section('main-content')

<section class="section">
    <div class="row">
       <div class="col-12">
        <div class="card-body">
            <h5 class="card-title">Сообщения с сайта</h5>

            @if (count($messages))
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Сообщение</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr class="align-middle @if($message->is_read === 0) table-active @endif">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $message->name }}</td>
                        <td><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></td>
                        <td>
                            <a href="{{ route('admin.messages.single', $message->id) }}">
                                {{ \Illuminate\Support\Str::limit($message->message, 50, $end='...') }}
                            </a>
                        </td>
                        <td>{{ $message->created_at }}</td>
                        <td >
                            <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger border-0" title="Удалить" onclick="return confirm('Вы действительно хотите удалить сообщение?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
              </table>

              {{ $messages->links('vendor.pagination.bootstrap-5') }}
            @else
                <p>Нет сообщений...</p>
            @endif

          </div>
       </div>
    </div>
  </section>

  <div id="addBlogCategoryModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Добавление тега</h5>
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
