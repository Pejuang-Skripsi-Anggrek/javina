@extends('/layout')

@section('content')

<!--Checkout page section-->
<div class="Checkout_section  mt-100" id="accordion">
    <div class="container">
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="#">
                        <h3>Billing Details</h3>
                        <div class="row">

                            <div class="col-lg-12 mb-20">
                                <label>Recipient Name <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Street address <span>*</span></label>
                                <input placeholder="House number and street name" type="text">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Province <span>*</span></label>
                                <select id="province" class="nice-select">
                                    @foreach($province as $p)
                                    <option value="1">{{$p['province']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <label> City <span>*</span></label>
                                <select id="province" class="nice-select">
                                    @foreach($city as $p)
                                    <option value="1">{{$p['city_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text">

                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Email Address <span>*</span></label>
                                <input type="text">

                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="/transaction" method="post">
                        @csrf
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $c)
                                    <tr>
                                        <td> {{$c['name']}} <strong> × {{$c['qty']}} </strong></td>
                                        <td>Rp. {{number_format($c['price']*$c['qty'])}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>Rp. {{number_format($total)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>Rp. {{number_format(22000)}}</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>Rp. {{number_format(22000 + $total)}}</strong></td>
                                        <input type="hidden" value="120000" name="{{22000 + $total}}}">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-bs-target="createp_account" />
                                <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="https://docs.midtrans.com/asset/image/main/midtrans-logo.png" alt=""></label>

                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                            PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <button type="submit">Proceed to Midtrans</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->

@endsection