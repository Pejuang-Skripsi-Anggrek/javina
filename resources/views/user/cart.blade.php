@extends('/layout')

@section('content')

<!--shopping cart area start -->
<div class="shopping_cart_area mt-100">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $c)
                                    <tr>
                                        <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td class="product_thumb"><a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a></td>
                                        <td class="product_name"><a href="#">{{$c['name']}}</a></td>
                                        <td class="product-price">Rp. {{number_format($c['publish_price'])}}</td>
                                        <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="{{$c['qty']}}" type="number"></td>
                                        <td class="product_total">Rp. {{number_format($c['publish_price'] * $c['qty'])}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button type="submit">update cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_total">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">Rp. {{number_format($total)}}</p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">Rp. {{number_format($total + (0.1*$total))}}</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="/checkout">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form>
    </div>
</div>
<!--shopping cart area end -->

@endsection