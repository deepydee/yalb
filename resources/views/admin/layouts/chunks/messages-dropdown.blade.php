@if ($messages->count())
<li class="dropdown-header">
    У вас {{ $messages->count() }} непрочитанных сообщения
    <a href="{{ route('admin.messages.index') }}"><span class="badge rounded-pill bg-primary p-2 ms-2">Смотреть все</span></a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  @foreach ($messages as $message)
  @if ($loop->iteration === 4)
      @break
  @endif
  <li class="message-item">
    <a href="{{ route('admin.messages.single', $message->id) }}">
      <div>
        <h4>{{ $message->name }}</h4>
        <p>{{ \Illuminate\Support\Str::limit($message->message, 30, $end='...') }}</p>
        <p>{{ $message->getCreatedAt() }}</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>
  @endforeach

  <li class="dropdown-footer">
    <a href="{{ route('admin.messages.index') }}">Все сообщения</a>
  </li>
@endif
