@extends("layouts.productdashboard")
@section('title', 'POS - Dashboard')
@section('page', 'pos')
@section("content")
<article class="container">
    <div class="sec_left">
        <div class="sec1_search">
            <form class="form" id="frmSearch" method="post" action="/pos/search">
                @csrf
                <input type="text" class="form-control search" name="search" placeholder="search item or category"/>
            </form>
        </div>
        <div id="result">

        </div>
    </div>
    <div class="sec_right">
        <div class="sec1_pos">
            <div class="sec1_cashier">
                <figure class="sec1_photo"></figure>
                <h5><small>I'm your cashier</small> Joven Logo</h5>
            </div>
            <div class="sec1_total">
                <h2>Order Details</h2>
                <table>
                    <tbody id="cartresult">

                    </tbody>
                </table>
                <table class="sec1_subtotal">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td>Discounts</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td>Tax(12%)</td>
                            <td>0.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <td>Total</td>
                            <td><span id="total">0.00</span></td>
                        </tr>
                    </tfoot>
                </table>
                <form id="frmPrint" action="pos/print">
                    @csrf
                    <input type="hidden" name="id" class="id" value=""/>
                    <input type="hidden" name="qty" class="qty" value=""/>
                    <input type="submit" id="print" class="btn btn-success btn-md" value="Print"/>
                </form>
            </div>
        </div>
    </div>
</article>
    <script src="{{ url('js/jquery.js') }}"></script>
    <script type="text/html" id="productTPL">
        <tr data-id="[ID]">
            <td>
                <div class="img-container">
                    <figure class="sec1_p3">
                        <img class="img-fluid" src="[IMG]" width="30"/>
                    </figure>
                </div>
            </td>
            <td class="sec1_title">[NAME]</td>
            <td>
                <div class="sec1_btns">
                    <button class="btn_minus">-</button>
                    <input type="number" class="qty" min="1" width="20" value="1"/>
                    <button class="btn_plus">+</button>
                </div>
            </td>
            <td><em >₱<span class="srp">[SRP]</span></em></td>
            <td>
                <a href="" class="remove btn-sm btn">remove</a>
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

                    __listen();
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
                    $(".btn_minus").off().on("click", function(e){
                        e.preventDefault();
                        
                        let me = $(this)
                        let qty = me.parents(".sec1_btns").find(".qty");

                        if(qty.val() > 1){
                            let val = parseInt(qty.val()) - 1
                            qty.val(val);
                        }

                        getTotal();
                    });

                    $(".btn_plus").off().on("click", function(e){
                        e.preventDefault();
                        
                        let me = $(this)
                        let qty = me.parents(".sec1_btns").find(".qty");

                        let val = parseInt(qty.val()) + 1
                        qty.val(val);
                        
                        getTotal();
                    });

                    $(".remove").off().on("click", function(e){
                        e.preventDefault();

                        $(this).parents("tr").remove();
                        getTotal();

                    });

                    $(".qty").off().on("change keyup", function(){
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