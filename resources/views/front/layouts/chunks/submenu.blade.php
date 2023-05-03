@if($subcategories)
    @foreach($subcategories as $category)
        @if (@blank($category->children))
        <li><a class="dropdown-item" href="/{{ $category->getUrl() }}">{{ $category->title }}</a></li>
        @else
        <li class="nav-item dropend">
            <a class="dropdown-item dropdown-toggle" href="/{{ $category->getUrl() }}" id="{{ $category->slug }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->title }}</a>
            <ul class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                @include('front.layouts.chunks.submenu', ['subcategories' => $category->getChildrenOrdered()])
            </ul>
        </li>
        @endif
    @endforeach
@endif
