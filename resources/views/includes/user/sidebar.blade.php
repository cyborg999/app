
@php
    $page = app()->view->getSections()["page"];
@endphp
<div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
    <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
      <svg class="bi" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="visually-hidden">Icon-only</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link {{ $page == 'home' ? 'active' : ''}} py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <img src="{{ url('/images/icons/home.png'); }}" alt="home"/>
        </a>
      </li>
      <li>
        <a href="/products" class="nav-link py-3 border-bottom {{ $page == 'product' ? 'active' : ''}}" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
          <img src="{{ url('/images/icons/product.png'); }}" alt="product"/>
        </a>
      </li>
      <li>
        <a href="/pos" class="nav-link py-3 border-bottom {{ $page == 'pos' ? 'active' : ''}}" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
        <img src="{{ url('/images/icons/pos.png'); }}" alt="pos"/>
        </a>
      </li>
      <li>
        <a href="/inventory" class="nav-link py-3 border-bottom {{ $page == 'inventory' ? 'active' : ''}}" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
          Inventory
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
          Sale
        </a>
      </li>
      <li>
        <a href="/profile" class="nav-link py-3 border-bottom {{ $page == 'profile' ? 'active' : ''}}" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
          Profile
        </a>
      </li>
    </ul>
    <div class="dropdown border-top">
      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/logout">Sign out</a></li>
      </ul>
    </div>
  </div>