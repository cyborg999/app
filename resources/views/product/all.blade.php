<html>
    <body>
        <a href="/dashboard">Dashboard</a>
        <a href="/products/add">Add Product</a>
        <a href="/products">All Products</a>
        <a href="/logout">logout</a>
        <h4>Add Product</h4>
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

        <table border=1>
            <thead>
                <tr>
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
                    <td>{{ $product["name"] }}</td>
                    <td>{{ $product["desc"] }}</td>
                    <td>{{ $product["srp"] }}</td>
                    <td>{{ $product["orig"] }}</td>
                    <td>{{ $product["qty"] }}</td>
                    <td>
                        <a href="product/edit/{{ $product['id'] }}">edit</a>
                        <a href="">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
   
    </body>
</html>