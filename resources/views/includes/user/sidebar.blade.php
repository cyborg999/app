@php
    $page = app()->view->getSections()["page"];
@endphp
<aside class="sec0">
      <figure class="sec0_fig1"></figure>
      <ul class="sidenav">
        
          <li class="home {{ $page == 'home' ? 'active' : ''}}"> <a href="/dashboard">Home</a></li>
          <li class="pos {{ $page == 'pos' ? 'active' : ''}}"> <a href="/pos">POS</a></li>
          <li class="user {{ $page == 'home' ? 'active' : ''}}"> <a href="/dashboard">Users</a></li>
          <li class="product {{ $page == 'product' ? 'active' : ''}}"> <a href="/products">products</a></li>
          <li class="profile {{ $page == 'profile' ? 'active' : ''}}"> <a href="/profile">profile</a></li>
          <li class="inventory {{ $page == 'inventory' ? 'active' : ''}}"> <a href="/inventory">inventory</a></li>
          <li class="users {{ $page == 'users' ? 'active' : ''}}"> <a href="/users">users</a></li>
          <li class="setting">settings</li>
          <li class="setting">supply</li>
          <li class="setting">sale</li>
          <li class="logout"></li>
      </ul>
  </aside>
