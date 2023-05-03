<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}">
          <i class="bi bi-grid"></i>
          <span>Главная</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.messages.index') }}" class="{{ (request()->is('admin/messages*')) ? 'active' : '' }}">
            <i class="bi bi-envelope"></i>
            <span>Сообщения @if ($unreadMessages->count())  <span class="badge bg-info badge-number">{{$unreadMessages->count()}}</span> @endif</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/blog*')) ? '' : 'collapsed' }}" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journals"></i><span>Блог</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="blog-nav" class="nav-content collapse {{ (request()->is('admin/blog*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.blog.categories.index') }}" class="{{ (request()->is('admin/blog/categories*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Категории @if ($categoriesCount) <span class="badge bg-secondary badge-number">{{$categoriesCount}}</span> @endif</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.blog.tags.index') }}" class="{{ (request()->is('admin/blog/tags*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Теги @if ($tagsCount) <span class="badge bg-secondary badge-number">{{$tagsCount}}</span> @endif</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.blog.posts.index') }}" class="{{ (request()->is('admin/blog/posts*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Статьи @if ($postCount) <span class="badge bg-secondary badge-number">{{$postCount}}</span> @endif</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.blog.comments.index') }}" class="{{ (request()->is('admin/blog/comments*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Комментарии @if ($commentsCount) <span class="badge bg-info badge-number">{{$commentsCount}}</span> @endif</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/catalog*')) ? '' : 'collapsed' }}" data-bs-target="#catalog-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journals"></i><span>Каталог</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="catalog-nav" class="nav-content collapse {{ (request()->is('admin/blog*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.catalog.categories.index') }}" class="{{ (request()->is('admin/catalog/categories*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Категории</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- End Components Nav -->
    </ul>

  </aside>
