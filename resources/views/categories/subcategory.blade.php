@if($subcategories)
    <ul>
        @foreach($subcategories as $category)
            <a href="{{ route('categories.show', ['category' => $category->slug ?? 'none']) }}">
                <li>{{ $category->title }}</li>
            </a>
            @include('categories.subcategory', ['subcategories' => $category->children])
        @endforeach
    </ul>
@endif
