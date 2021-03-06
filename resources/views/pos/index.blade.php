@extends("layouts.productdashboard")
@section('title', 'POS - Dashboard')
@section('page', 'pos')
@section("content")
  <div class="container">
    <div class="row">
    <div class="col-lg-6">
            <form class="form" id="frmSearch" method="post" action="/pos/search">
                @csrf
                <input type="text" class="form-control" name="search" />
                <input type="submit" class="btn btn-md btn-primary" value="search"/>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>SRP</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="result">
                    
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <h3>Total: P<span id="total">0.00</span></h3>
            <form id="frmPrint" action="pos/print">
                @csrf
                <input type="hidden" name="id" class="id" value=""/>
                <input type="hidden" name="qty" class="qty" value=""/>
                <input type="submit" class="btn btn-success btn-md" value="Print"/>
            </form>
            <table id="cart">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>SRP</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cartresult">
                    
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ url('js/jquery.js') }}"></script>
    <script type="text/html" id="productTPL">
        <tr data-id="[ID]">
            <td><img class="img-fluid" src="[IMG]" width="30"/></td>
            <td>[NAME]</td>
            <td class="srp">[SRP]</td>
            <td><input type="number" class="qty" min="1" width="20" value="1"/></td>
            <td>
                <a href="" class="remove btn-sm btn-danger btn">remove</a>
            </td>
        </tr>
    </script>
    <script>
        (function($){
            $(document).ready(function(){
                let getTotal = () => {
                    let tbody = $("#cartresult");
                    let total = 0;

                    tbody.find("tr").each(function(x, tr){
                        let product = $(tr);
                        let productId = product.data("id");
                        let qty = product.find(".qty").val();
                        let srp = parseFloat(product.find(".srp").html());

                        total += qty *srp;

                    });

                    $("#total").html(new Intl.NumberFormat().format(total));
                }

                let print = () => {
                    let tbody = $("#cartresult");
                    let total = 0;
                    let ids = [];
                    let qtys = [];

                    tbody.find("tr").each(function(x, tr){
                        let product = $(tr);
                        let productId = product.data("id");
                        let qty = product.find(".qty").val();

                        console.log(qty, productId)
                        ids.push(productId);
                        qtys.push(parseInt(qty));

                    });
                    return [ids, qtys];
                }

                let updateQty = (id) => {
                    let tbody = $("#cartresult");
                    let found = false;

                    tbody.find("tr").each(function(x, tr){
                        let productId = $(tr).data("id");
                        let qty = $(tr).find(".qty");

                        if(id == productId){
                            qty.val(parseInt(qty.val())+1);
                            found = true;
                        }
                    });

                    return found;
                }

                $("#frmPrint").off().on("submit", function(e){
                    e.preventDefault();

                    let me = $(this);
                    let [id, qty] = print();

                    me.find(".id").val(id);
                    me.find(".qty").val(qty);

                    $.ajax({
                        url : me.attr("action"),
                        data : me.serialize(),
                        type : "post",
                        dataType: "json",
                        success: function(res){
                            $("#total").html(new Intl.NumberFormat().format(res.total));

                            if(res.success == false){
                                alert("Transaction failed, please try again");
                            }

                            $("#result, #cartresult").html("");
                        }
                    });
                });
                    
                let __listen = function(){

                    $(".remove").off().on("click", function(e){
                        e.preventDefault();

                        $(this).parents("tr").remove();
                        getTotal();
                    });

                    $(".qty").off().on("change", function(){
                        getTotal();
                    });

                    $(".frmAdd").off().on("submit", function(e){
                        e.preventDefault();

                        let me = $(this);
                        let tbody = $("#cartresult");
                        let tpl = $("#productTPL").html();
                        let id = me.data("id");

                        //check first if item exists, if true, add to qty instead
                        if(updateQty(id) == false) {
                            $.ajax({
                                url : me.attr("action"),
                                data : me.serialize(),
                                type : "post",
                                dataType: "json",
                                success : function(res){
                                    let p = res.product;

                                    tpl = tpl.replace("[IMG]", p.path).
                                        replace("[NAME]", p.name).
                                        replace("[SRP]", p.srp).
                                        replace("[ID]", p.id).
                                        replace("[ID]", p.id);

                                    tbody.append(tpl);

                                    __listen();
                                }
                                , error : function(res){
                                    console.log("err", res);
                                }
                                , complete : function(){
                                    getTotal();
                                }
                            });
                        } else {
                            getTotal();
                        }
                    });
                }

                $("#frmSearch").on("submit", function(e){
                    let me = $(this);
                    let tbody = $("#result");
                    
                    e.preventDefault();
                    tbody.html("");
                    
                    $.ajax({
                        url : me.attr("action"),
                        data : me.serialize(),
                        type : "post",
                        success : function(res){
                            tbody.append(res)

                            __listen();
                        }
                    })
                });
            })
        })(jQuery);
    </script>
  </div>
@stop
  </body>
</html>