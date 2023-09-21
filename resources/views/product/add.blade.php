@extends("layouts.productdashboard")
@section('title', 'Product - Dashboard')
@section('page', 'product')
@section("content")
  <div class="container">
    <h1 class="h1">Add Product</h1>
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
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img width="100" src='{{  url("/images")."/".Session::get("image") }}'>
        @endif

    <form class="form" method="post" action="/product/add" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <label class="form-label" for="inputImage">Image:</label>
            <input 
                type="file" 
                name="image" 
                id="inputImage"
                class=" @error('image') is-invalid @enderror form-control form-control-md"/>

            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </fieldset>
        <fieldset>
            <label class="form-label">Barcode</label>
            <input type="text" class="form-control" name="barcode" value="1111133123"/>
        </fieldset>
        <fieldset>
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name"/>
        </fieldset>
        <fieldset>
            <label class="form-label">Description</label>
            <textarea name="desc" class="form-control" ></textarea>
        </fieldset>
        <fieldset>
            <label class="form-label">SRP(Sales Retail Price)</label>
            <input type="number" name="srp" class="form-control" />
        </fieldset>
        <fieldset>
            <label class="form-label">Original Price</label>
            <input type="number" name="orig" class="form-control" />
        </fieldset>
        <fieldset>
            <label class="form-label">Quantity</label>
            <input type="number" min="1" name="qty" class="form-control" />
        </fieldset>
        <div class="col-12">
            <input type="submit" class="btn btn-lg btn-primary">
        </div>
    </form>
  </div>
@stop
  </body>
</html>


