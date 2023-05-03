@if (count($categories))
    @foreach ($categories as $category)
    @if (@blank($category->children))
    <li class="nav-item">
        <a class="nav-link" href="/{{ $category->getUrl() }}">{{ $category->title }}</a>
    </li>
    @else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/{{ $category->getUrl() }}" id="{{ $category->slug }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->title }}</a>
        <ul class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
            @include('front.layouts.chunks.submenu', ['subcategories' => $category->getChildrenOrdered()])
        </ul>
    </li>
    @endif
    @endforeach
@endif
