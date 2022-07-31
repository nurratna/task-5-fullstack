<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light bg-navbar accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon">
      <img src="{{ asset('assets/img/logo/investree.webp') }}">
    </div>
    <div class="sidebar-brand-text mx-3">BLOG</div>
  </a>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Menu
  </div>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('categories.index') }}">
      <i class="fas fa-tags"></i>
      <span>Categories</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('articles.index') }}">
      <i class="fas fa-newspaper"></i>
      <span>Articles</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="version">Version {{config('APP_VERSION', '1.5.0')}}</div>
</ul>
<!-- Sidebar -->