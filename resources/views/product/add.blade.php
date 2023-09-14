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
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src='{{  url("/images")."/".Session::get("image") }}'>
        @endif

    <form method="post" action="/product/add" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <label for="inputImage">Image:</label>
            <input 
                type="file" 
                name="image" 
                id="inputImage"
                class=" @error('image') is-invalid @enderror"/>

            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </fieldset>
        <fieldset>
            <label>Name</label>
            <input type="text" name="name"/>
        </fieldset>
        <fieldset>
            <label>Description</label>
            <textarea name="desc"></textarea>
        </fieldset>
        <fieldset>
            <label>SRP(Sales Retail Price)</label>
            <input type="text" name="srp"/>
        </fieldset>
        <fieldset>
            <label>Original Price</label>
            <input type="text" name="orig"/>
        </fieldset>
        <fieldset>
            <label>Quantity</label>
            <input type="number" min="1" name="qty"/>
        </fieldset>
        <fieldset>
            <input type="submit">
        </fieldset>
    </form>
   
    </body>
</html>