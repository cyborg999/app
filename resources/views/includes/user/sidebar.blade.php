@php
    $page = app()->view->getSections()["page"];
@endphp
<aside class="sec0">
      <figure class="sec0_fig1"></figure>
      <ul class="sidenav">
        
          <li class=" {{ $page == 'home' ? 'active' : ''}}"> <a class="home" href="/dashboard">Home</a></li>
          <li class=" {{ $page == 'pos' ? 'active' : ''}}"> <a class="pos" href="/pos">POS</a></li>
          <li class=" {{ $page == 'home' ? 'active' : ''}}"> <a  class="user" href="/users">Users</a></li>
          <li class=" {{ $page == 'product' ? 'active' : ''}}"> <a  class="product" href="/products">products</a></li>
        <!-- <li class="profile {{ $page == 'profile' ? 'active' : ''}}"> <a href="/profile">profile</a></li> -->
          <!-- <li class=" {{ $page == 'inventory' ? 'active' : ''}}"> <a class="inventory" href="/inventory">inventory</a></li> -->
          <!-- <li class="users {{ $page == 'users' ? 'active' : ''}}"> <a href="/users">users</a></li> -->
          <!-- <li class="setting">settings</li>
          <li class="setting">supply</li>
          <li class="setting">sale</li> -->
          <li class="" href="/logout"><a class="logout" href="/logout">logout</a></li>
      </ul>
  </aside>
