@extends("layouts.userdashboard")
@section('title', 'User - Dashboard')
@section('page', 'home')
@section("content")
  <div class="container">
    <h1>Add new user</h1>
  </div>
  <div class="container">
  @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
             <a href="/login" class="alert-link">click here to login</a>. 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
  </div>
  <div class="container">
    <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/register">
        @csrf
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingName" name="name" placeholder="Name">
        <label for="floatingName">Name</label>
        </div>
        <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
        <hr class="my-4">
        <small class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis similique minus doloremque. Cum doloribus praesentium sit quaerat earum. Ut perspiciatis neque accusantium nisi dolorem sed odit voluptatem reiciendis delectus similique.
        <a href="/login">Login</a>
        </small>
    </form>
  </div>
@stop
  </body>
</html>