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
                                <select id="province" name="province" class="nice-select">
                                    @foreach($province as $p)
                                    <option value="{{$p['province_id']}}">{{$p['province']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <label> City <span>*</span></label>
                                <select id="city" name="city" class="nice-select">
                                    <option value="1">Select Province First...</option>
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <label> Courier <span>*</span></label>
                                <select id="courier" name="courier" class="nice-select">
                                    <option value="jne">Select City First...</option>
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <label> Service <span>*</span></label>
                                <select id="service" name="service" class="nice-select">
                                    <option value="1">Select Courier First...</option>
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
                                        <td>Rp. {{number_format($c['spec']['publish_price']*$c['qty'])}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>Rp. {{number_format($total)}}</td>
                                        <input type="hidden" name="subtotal" value="{{$total}}">
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td name="shipping" id="shipping"><strong>Choose Courier First...</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td name="total"><strong>Rp. {{number_format($total)}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <label> <img src="https://docs.midtrans.com/asset/image/main/midtrans-logo.png" alt="">
                                </label>
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

<!-- Dependent Select -->
<script type="text/javascript">
// City Select
jQuery(document).ready(function() {
    $('select[name="province"]').on('change', function() {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                url: '/city/' + stateID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="city"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="city"]').append('<option value="' + value[
                                'city_id'] + '">' + value['city_name'] +
                            '</option>');
                    });


                }
            });
        } else {
            $('select[name="city"]').empty();
        }
    });
});

// Province Select
jQuery(document).ready(function() {
    $('select[name="city"]').on('change', function() {
        $('select[name="courier"]').empty();
        $('select[name="courier"]').append('<option value= "jne"> JNE </option>' +
            '<option value= "tiki"> TIKI </option>' +
            '<option value= "pos"> POS Indonesia </option>');
    });
});

jQuery(document).ready(function() {
    $('select[name="courier"]').on('change', function() {
        var stateID = $('select[name=city]').val();
        console.log(stateID);
        var courierID = $(this).val();
        console.log(courierID);
        if (stateID) {
            $.ajax({
                url: '/shipping/' + stateID + '/' + courierID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="service"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="service"]').append('<option value="' + value
                            .service + '">' + value.service + " - " + value
                            .cost[0].etd + ' hari' + '</option>');
                    });
                }
            });
        } else {
            $('select[name="city"]').empty();
        }
    });
});

jQuery(document).ready(function() {
    $('select[name="service"]').on('change', function() {
        var stateID = $('select[name=city]').val();
        var courierID = $('select[name=courier]').val();
        var serviceID = $('select[name=service]').val();
        var serviceSearch;

        if (serviceID) {
            $.ajax({
                url: '/shipping/' + stateID + '/' + courierID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        serviceSearch = value.service;
                        if (serviceSearch === serviceID) {
                            console.log(value.service + " === " + serviceID)
                            console.log(value.cost[0].value)
                            $('td[name="shipping"]').empty();
                            $('td[name="shipping"]').append('Rp. ' + value.cost[0]
                                .value);
                            var total = parseInt(value.cost[0].value) + parseInt($(
                                'input[name="subtotal"]').val());
                            $('td[name="total"]').empty();
                            $('td[name="total"]').append('Rp. ' + total +
                                '<input type="hidden" value="' + total +
                                '" name="price_total" id="price_total">');
                        } else {
                            console.log(value.service + " != " + serviceID)
                        }
                    });
                }
            });
        } else {
            $('select[name="city"]').empty();
        }
    });
});
</script>
@endsection