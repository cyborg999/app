@extends("layouts.productdashboard")
@section('title', 'POS - Dashboard')
@section('page', 'pos')
@section("content")
<article class="container">
    <div class="sec_left">
        <style>
            /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: none;
  border-top: none;
  margin-bottom: 10px;
}
        </style>
        <div class="tab">
            <button class="tablinks" target="#searchTab">Search</button>
            <button class="tablinks active" target="#scanTab">Scan</button>
        </div>

        <!-- Tab content -->
        <div id="searchTab" class="tabcontent ">
            <div class="sec1_search">
                <form class="form twowayform" id="frmSearch" method="post" action="/pos/search">
                    @csrf
                    <input type="text" class="form-control search" name="search" placeholder="search item or category"/>
                </form>
            </div>
        </div>

        <div id="scanTab" class="tabcontent active">
            <div class="sec1_search">
                <form class="form twowayform" id="frmScan" method="post" action="/pos/scan">
                    @csrf
                    <input type="text" class="form-control search" name="search" placeholder="scan barcode"/>
                </form>
            </div>
        </div>


        
        <div id="result">

        </div>
    </div>
    <div class="sec_right">
        <div class="sec1_pos">
            <div class="sec1_preview" id="sec1_preview">
                <style>
                    .sec1_preview {
    position: absolute;
    left: -60%;
    border: 1px solid black;
    padding: 10px;
    box-sizing: border-box;
    width: 60%;
    top: 0;
    background-color: white;
    text-align: center;
}
.sec1_preview_logo {
    background: url(./../images/global/logo1.png) center no-repeat;
    background-size: contain;
    width: 70px;
    height: 70px;
    margin: 0 auto;
}
.sec2_preview_bottom {
    margin-top: 20px;
}
.sec2_preview_bottom p {
    padding: 0 30px;
    font-size: 12px;
    text-align: center;
    margin: 0;
}
.sec1_preview thead {
    margin-bottom: 20px;
}
.sec1_preview th {
    font-size: 12px;
}
.sec1_preview tr {
    font-size: 12px;
    text-align: center;
}
.sec1_preview small {
    padding-bottom: 10px;
    display: block;
}
.sec1_preview td b {
    display: block;
    margin: 3px 0;
    box-sizing: border-box;
}
.sec1_preview td p {
    display: inline-block;
    box-sizing: border-box;
    padding: 0;
    box-sizing: border-box;
    margin: 3px 0 3px;

}
.sec1_preview td em {
    text-align: left;
    padding: 3px;
    float: left;
    margin-left: 5px;
}
.sec1_preview .sec1_title {
    text-align: left;
    font-weight: normal;
    font-size: 12px;
    padding: 0;
    margin: 0;
}
.sec1_preview th:nth-of-type(odd){
    text-align: left;
}
.sec1_preview th:nth-of-type(even){
    text-align: right;
}
.sec1_preview .bordered {
    border: 1px dashed black;
    margin: 10px;
    padding: 10px;
    line-height: 2;
}
.sec1_preview tr td:first-of-type {
    text-align: left;
    padding-left: 5px;
}
#receiptPreview .sec1_btns,
#receiptPreview td:last-of-type,
#receiptPreview td:first-of-type {
    display: none;
}
.sec1_preview h5 {
    text-transform: uppercase;
    font-weight: 700;
    line-height: 1;
    margin: 5px 0;
}
.sec1_preview h6 {
    line-height: 1;
    font-size: 12px;
}

                </style>
                <img src="./../images/global/logo1.png" style="margin: 0 auto;display:block;padding:0;" width="70" height="auto" alt="Logo">

                <!-- <figure class="sec1_preview_logo"></figure> -->
                <h5 style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif; text-align:center;text-transform: uppercase; font-weight: 800; font-size:16px; line-height: 1; margin: 5px 0;">T'yang Malou</h5>
                <h6 style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Tabi, Boac, Marinduque</h6>
                <h6 style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">VAT #: 99919399</h6>
                <table>
                    <thead>
                        <tr>
                            <th colspan="2" style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Cash Sales</th>
                            <th colspan="2" style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Cashier</th>
                        </tr>
                        <tr>
                            <th colspan="2"><small style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">POS01</small></th>
                            <th colspan="2"><small style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Jordan Sadiwa</small></th>
                        </tr>
                        <tr class="bordered">
                            <td><b style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Item</b></td>
                            <td><b style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Quantity</b></td>
                            <td><b style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Price</b></td>
                            <td><b style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Amount</b></td>
                        </tr>
                    </thead>
                    <tbody id="receiptPreview">
                        
                    </tbody>
                    <tfoot>
                        <tr class="bordersed">
                            <td><h5 style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Total:</h5></td>
                            <td></td>
                            <td></td>
                            <td><h5 style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">99.99</h5></td>
                        </tr>
                        <tr>
                            <td><em style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;">Payment Received</em></td>
                            <td></td>
                            <td></td>
                            <td style="line-height:1;margin:0;padding:0;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;" id="previewPaymentReceived">00.00</td>
                        </tr>
                        <tr>
                            <td><em>Change</em></td>
                            <td></td>
                            <td></td>
                            <td id="previewChange">00.00</td>
                        </tr>
                        <tr>
                            <td><em><span id="totalItems">0</span> Items</em></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="sec2_preview_bottom">
                    <p>Customer Agrees to pay the above total amount.</p>
                    <p>Thanks for shopping here, we will see you soon!</p>
                    <br/>
                    <p style="line-height:1;margin:0;padding-bottom:10px;box-sizing:border-box;font-family: Inter, Helvetica, sans-serif;text-align:center; line-height: 1; font-size: 12px;"><small id="currDate">02/21/2024 11:11pm</small></p>
                </div>
            </div>
            <!-- <div class="sec1_cashier">
                <figure class="sec1_photo"></figure>
                <h5><small>I'm your cashier</small> Joven Logo</h5>
            </div> -->
            <div class="sec1_total">
                <h2>Order Details</h2>
                <table>
                    <!-- <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th><small>sub</small>Total</th>
                        </tr>
                    </thead> -->
                    <tbody id="cartresult">

                    </tbody>
                </table>
                <table class="sec1_subtotal">
                    <tbody>
                        <!-- <tr>
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
                        </tr> -->
                        <tr>
                            <td>Payment Received</td>
                            <td><input type="number" class="form-control" id="paymentReceived" placeholder="00.00" required></td>
                        </tr>
                        <tr>
                            <td>Change</td>
                            <td id="change2">00.00</td>
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
                    <input type="hidden" name="payment" class="payment" value=""/>
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
                <p class="sec1_preview_only">

                </p>
            </td>
            <td><em ><span class="srp">[SRP]</span></em></td>
            <td><span class="total">[TOTAL]</span></td>
            <td>
                <a href="" class="remove btn-sm btn">x</a>
            </td>
        </tr>
    </script>
    <script>
        (function($){
            $(document).ready(function(){
                $(".tablinks").on("click", function(){
                    let me = $(this);
                    let target = me.attr("target");
                    // searchTab
                    console.log(target)
                    
                    $(".tablinks").removeClass("active");
                    $(".tabcontent").removeClass("active");
                    $(target).addClass("active");
                    me.addClass("active");

                });

                let getTotal = () => {
                    let tbody = $("#cartresult");
                    let total = 0;
                    
                    tbody.find("tr").each(function(x, tr){
                        let product = $(tr);
                        let productId = product.data("id");
                        let qty = product.find(".qty").val();
                        let srp = parseFloat(product.find(".srp").html());
                        let itemTotal = product.find(".total");
                        let previewQty = product.find(".sec1_preview_only");

                        total += qty *srp;

                        itemTotal.html(total)
                        previewQty.html(qty)
                    });

                    let finalTotal = new Intl.NumberFormat().format(total);
                    $("#total").html(finalTotal);
             
                    __listen();
                }

                let getTimeStamp = () => {
                    var currentDate = new Date();
                    var date = currentDate.getDate();
                    var month = currentDate.getMonth() + 1; // Months are zero based, so we add 1
                    var year = currentDate.getFullYear();
                    var hours = currentDate.getHours();
                    var ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // Handle midnight (0 hours)

                    var minutes = currentDate.getMinutes();
                    var seconds = currentDate.getSeconds();

                    return month +"/"+date+"/"+year+" "+hours+":"+minutes+" "+ampm;
                }

                let generateReceiptPreview = (itemCount) => {
                    let tbl1 = $("#cartresult")
                    let tbl2 = $("#receiptPreview");

                    tbl2.html("");
                    tbl2.append(tbl1.html());

                    let paymentReceived = parseFloat($("#paymentReceived").val());
                    let finalTotal = parseFloat($("#total").html());
                    
                    $("#previewPaymentReceived").html(paymentReceived);
                    $("#previewChange").html($("#paymentReceived").val() - finalTotal);
                    $("#totalItems").html(itemCount);
                    $("#currDate").html(getTimeStamp);
                }

                let print = () => {
                    let tbody = $("#cartresult");
                    let total = 0;
                    let ids = [];
                    let qtys = [];
                    let itemCount = 0;

                    tbody.find("tr").each(function(x, tr){
                        let product = $(tr);
                        let productId = product.data("id");
                        let qty = product.find(".qty").val();

                        itemCount += qty;
                        ids.push(productId);
                        qtys.push(parseInt(qty));
                    });

                    generateReceiptPreview(parseInt(itemCount));

                    return [ids, qtys];
                }

                let printReceipt = () => {
                    let printContent = $("#sec1_preview").html();
                    var originalContent = document.body.innerHTML;
                  
                    document.body.innerHTML = printContent;
                    window.print();
                    document.body.innerHTML = originalContent;
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
                    let paymentReceived = $("#paymentReceived").val();

                    me.find(".id").val(id);
                    me.find(".qty").val(qty);
                    me.find(".payment").val(paymentReceived);

                    if(paymentReceived == ""){
                        alert("Enter Payment Received")
                        return false;
                    }

                    $.ajax({
                        url : me.attr("action"),
                        data : me.serialize(),
                        type : "post",
                        dataType: "json",
                        success: function(res){
                            $("#total").html(new Intl.NumberFormat().format(res.total));

                            if(res.success == false){
                                alert("Transaction failed, please try again");
                            } else {
                                // print receipt
                                // printReceipt();

                                $("#result, #cartresult").html("");
                            }

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

                __listen();

                $("#paymentReceived").on("change keyup", function(){
                    let me = $(this);
                    let payment = me.val();
                    let total = parseFloat($("#total").html());

                    $("#change2").html(parseFloat(payment) - total);
                });

                // $(".search").on("change keyup", function(){
                //     let me = $(this);
                //     let txt = me.val();
                //     let form = me.parents(".twowayform");
                //     let type = form.attr("id");
                //     console.log(txt, type);

                //     if(type == "frmScan"){
                //         form.trigger("submit");
                //     }
                // });

                function debounce(func, timeout = 200){
                    let timer;
                    return (...args) => {
                        clearTimeout(timer);
                        timer = setTimeout(() => { func.apply(this, args); }, timeout);
                    };
                }
                function saveInput(me,val){
                    let form = me.parents(".twowayform");
                    let type = form.attr("id");

                    if(type == "frmScan"){
                        form.trigger("submit");
                    }
                }

                const processChange = debounce((me,val) => saveInput(me,val));

                $('.search').on('keyup', function(){
                    console.log("test")
                    let me = $(this);
                    let val = me.val();
                    processChange(me, val);
                })

                $(".twowayform").on("submit", function(e){
                    let me = $(this);
                    let tbody = $("#result");
                    let type = me.attr("id");
                    
                    e.preventDefault();
                    tbody.html("");
                    
                    $.ajax({
                        url : me.attr("action"),
                        data : me.serialize(),
                        type : "post",
                        success : function(res){
                            console.log(res, type)
                            tbody.append(res);


                            __listen();

                            if(type == "frmScan"){
                                $(".frmAdd").first().trigger("submit");
                                $(".search").val("");
                                console.log("trigg")
                            }
                            
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