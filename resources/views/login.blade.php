@extends('layouts.default')
@section('title', 'SadiwaPOS - Login')
@section('content')
  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Login</h1>
        <p class="col-lg-10 fs-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio eaque dolorem recusandae quidem, eveniet possimus unde alias quaerat, explicabo amet earum harum, molestias consequatur repudiandae pariatur provident quos assumenda. Sint!</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/login">
            @csrf
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <hr class="my-4">
          <small class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis similique minus doloremque. Cum doloribus praesentium sit quaerat earum. Ut perspiciatis neque accusantium nisi dolorem sed odit voluptatem reiciendis delectus similique.
            <a href="/register">Sign Up</a>
          </small>
        </form>
      </div>
    </div>
  </div>
@stop
  </body>
</html>