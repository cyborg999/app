@extends("layouts.inventorydashboard")
@section('title', 'Inventory - Dashboard')
@section('page', 'inventory')
@section("content")
  <div class="container">
  <h1 class="h1">Inventory</h1>
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
                    <th>User</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $idx => $product)
                <tr>
                    <td>{{ $product->user }}</td>
                    <td><img width="50" src="{{ asset('/images/'.$product->path) }}"/></td>
                    <td>{{ $product->name }}</td>
                    <td class="productQty" data-qty="{{ $product->qty }}">{{ $product->qty }}</td>
                    <td>{{  date('M-d-Y h:i', strtotime($product->dateadded)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
@stop
  </body>
</html>