<!DOCTYPE html>
<html lang="en">
@include('includes.user.head')

<body>
    <main class="container-fluid">
         @include('includes.user.sidebar')

         <section class="sec1">
            <article class="container">
                <div class="sec_left">
                   <div class="sec1_search">
                        <form action="">
                            <input type="text" class="search" placeholder="search item or category"/>
                        </form>
                    </div>
                    <div class="sec1_product">
                        <div class="img-container">
                            <figure class="sec1_p1"></figure>
                        </div>
                        <h2>T-Bone Stake</h2>
                        <p>16 mins to cook</p>
                        <em>$16.50</em>
                    </div>
                    <div class="sec1_product">
                        <div class="img-container">
                            <figure class="sec1_p2"></figure>
                        </div>
                        <h2>Chef’s Salmon</h2>
                        <p>16 mins to cook</p>
                        <em>$12.40$</em>
                    </div> 
                    @yield('content')
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
                               <tbody>
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <figure class="sec1_p3"></figure>
                                        </div>
                                    </td>
                                    <td class="sec1_title">T-Bone Stake</td>
                                    <td>
                                        <div class="sec1_btns">
                                            <button class="btn_minus">-</button>
                                            <p>1</p>
                                            <button class="btn_plus">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <em>$14.90</em>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <figure class="sec1_p2"></figure>
                                        </div>
                                    </td>
                                    <td class="sec1_title">T-Bone Stake</td>
                                    <td>
                                        <div class="sec1_btns">
                                            <button class="btn_minus">-</button>
                                            <p>1</p>
                                            <button class="btn_plus">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <em>$14.90</em>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <figure class="sec1_p1"></figure>
                                        </div>
                                    </td>
                                    <td class="sec1_title">T-Bone Stake</td>
                                    <td>
                                        <div class="sec1_btns">
                                            <button class="btn_minus">-</button>
                                            <p>1</p>
                                            <button class="btn_plus">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <em>$14.90</em>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <figure class="sec1_p3"></figure>
                                        </div>
                                    </td>
                                    <td class="sec1_title">T-Bone Stake</td>
                                    <td>
                                        <div class="sec1_btns">
                                            <button class="btn_minus">-</button>
                                            <p>1</p>
                                            <button class="btn_plus">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <em>$14.90</em>
                                    </td>
                                </tr>
                               </tbody>
                            </table>
                            <table class="sec1_subtotal">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>$199.50</td>
                                    </tr>
                                    <tr>
                                        <td>Discounts</td>
                                        <td>-$8.00</td>
                                    </tr>
                                    <tr>
                                        <td>Tax(12%)</td>
                                        <td>$11.20</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td>$192.46</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button id="print">Print Bills</button>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <script src='{{ asset("js/bootstrap-5.0.2-dist//js/bootstrap.bundle.min.js") }}' integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>