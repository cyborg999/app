@extends("layouts.productdashboard")
@section('title', 'Product - Dashboard')
@section('page', 'product')
@section("content")
  <div class="container">
  <h1 class="h1">All Products</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table border=1 class="table">
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>SRP</th>
                    <th>Original Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $idx => $product)
                <tr>
                    <td><img width="50" src="{{ asset('/images/'.$product->path) }}"/></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->srp }}</td>
                    <td>{{ $product->orig }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>
                        <a href="product/edit/{{ $product->id }}">edit</a>
                        <a href="">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
@stop
  </body>
</html>