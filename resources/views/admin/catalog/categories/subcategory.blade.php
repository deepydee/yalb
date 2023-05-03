@if($subcategories)
    <ul>
        @foreach($subcategories as $category)
        <li class="{{ @blank($category->parent_id) ? 'fw-bold' : '' }}">{{ $category->title }}
            <a href="{{ route('admin.catalog.categories.create', compact('category')) }}"
            class="btn btn-outline-secondary border-0 px-1 py-0"
            title="Добавить потомка"
            >
                <i class="bi bi-node-plus"></i>
            </a>
            <a href="{{ route('admin.catalog.categories.edit', $category) }}"
                class="btn btn-outline-secondary border-0 px-1 py-0"
                title="Редактировать"
            >
                <i class="bi bi-pencil-square"></i>
            </a>
            <form
            action="{{ route('admin.catalog.categories.update',
                [
                    'category' => $category,
                    'title' => $category->title,
                    'parent_id' => $category->parent_id,
                    'shiftUp' => true
                ]) }}"
            method="POST"
            class="d-inline-block"
            >
            @csrf
            @method('PUT')
            <button
                type="submit"
                class="btn btn-outline-secondary border-0 px-1 py-0"
                title="Сдвинуть вверх"
            >
                <i class="bi bi-caret-up"></i>
            </button>
            </form>
            <form
                action="{{ route('admin.catalog.categories.update',
                    ['category' => $category,
                    'title' => $category->title,
                    'parent_id' => $category->parent_id,
                    'shiftDown' => true
                    ]) }}"
                method="POST"
                class="d-inline-block"
            >
            @csrf
            @method('PUT')
            <button
                type="submit"
                class="btn btn-outline-secondary border-0 px-1 py-0"
                title="Сдвинуть вниз"
            >
                <i class="bi bi-caret-down"></i>
            </button>
            </form>
            <form
                action="{{ route('admin.catalog.categories.destroy', $category) }}"
                method="POST"
                class="d-inline-block"
            >
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="btn btn-outline-danger border-0 px-1 py-0"
                    title="Удалить"
                    onclick="return confirm('Вы действительно хотите удалить категорию?')"
                >
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </li>
            @include('admin.catalog.categories.subcategory', ['subcategories' => $category->children])
        @endforeach
    </ul>
@endif
