@extends("layouts.productdashboard")
@section('title', 'Product - Dashboard')
@section('page', 'product')
@section("content")
    <div class="container">
        <h1 class="h1">All Products</h1>
        <a href="products/add" class="btn btn-lg">Add New</a>
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
    </div>
  <div class="container">
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
                    <td class="productQty" data-qty="{{ $product->qty }}">{{ $product->qty }}</td>
                    <td>
                        <a href="product/edit/{{ $product->id }}" class="btn btn-sm btn-warning">edit</a>
                         <!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-success updateInventory" data-qty="{{ $product->qty }}" data-name="{{ $product->name }}"  data-id="{{ $product->id }}" >
  Update Inventory
</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="frmInventoryUpdate" action="/inventory/add">
    @csrf
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Inventory</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label for="">Product Name:
            <input type="hidden" value=""  class="form-control" name="id" id="pid" />
            <input type="text" readonly value=""  class="form-control" name="name" id="pname" />
        </label>
        <label for="">Quantity:
            <input type="number" min="1" class="form-control" readonly value="" name="qty" id="pqty" />
        </label>
        <label for="">Additional Quantity:
            <input type="number"  min="1" class="form-control" value="1" name="qty" id="pnewqty" />
        </label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit " id="saveInventory" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
    </form>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    (function($){
        $(document).ready(function(){
            let target = null;
            let updateInventory = $(".updateInventory");
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
             keyboard: false
            });

            $("#frmInventoryUpdate").on("submit", function(e){
                e.preventDefault();

                let me = $(this);
                let productId = $("#pid").val();
                let qty = $("#pnewqty").val();

                $.ajax({
                    url : me.attr("action"), 
                    data : me.serialize(),
                    type : "post",
                    dataType : "json",
                    success: function(res){
                        if(res.added){
                            target.data("qty", res.product.qty);
                            target.html(res.product.qty);
                        }

                        myModal.hide();
                    }

                });
            });

            updateInventory.off().on("click", function(){
                let me = $(this);

                target = me.parents("tr").find(".productQty");

                let id = me.data("id");
                let qty = target.data("qty");
                let name = me.data("name");

                $("#pname").val(name);
                $("#pqty").val(qty);
                $("#pid").val(id);
                console.log(target.html())
                myModal.show();
            });
        });
    })(jQuery);
</script>
@stop

  </body>
</html>