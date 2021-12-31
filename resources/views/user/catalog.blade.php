@extends('/layout')

@section('content')

<!--shop  area start-->
<div class="shop_area shop_fullwidth mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_4" type="button" class="active btn-grid-4" data-bs-toggle="tooltip"
                            title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper grid_4">
                    @foreach($product as $p)
                    <div class="col-lg-3 col-md-4 col-12 ">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="{{$p['list_picture'][0]['url']}}" alt="" class="thumb_small"></a>
                                    <div class="label_product">
                                        @if($p['diskon'] == null)
                                        @else
                                        <span class="label_sale">{{ $p['diskon']}} %</span>
                                        @endif
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                        class="icon-shopping-bag"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="icon-sliders"></i></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="icon-heart"></i></a></li>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modal_box" title="quick view"> <i
                                                        class="icon-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="action_links list_action">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modal_box" title="quick view"> <i
                                                        class="icon-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content grid_content">
                                    <div class="product_price_rating">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">{{$p['name']}}</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">Rp.
                                                {{number_format($p['spec'][0]['publish_price'])}}</span>
                                            @if($p['diskon'] == null)
                                            @else
                                            <span class="old_price">Rp.
                                                {{number_format($p['spec'][0]['base_price'])}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="product-details.html">{{$p['name']}}</a>
                                    </h4>
                                    <div class="price_box">
                                        <span class="current_price">Rp.
                                            {{number_format($p['spec'][0]['publish_price'])}}</span>
                                        @if($p['diskon'] == null)
                                        @else
                                        <span class="old_price">Rp.
                                            {{number_format($p['spec'][0]['base_price'])}}</span>
                                        @endif
                                    </div>
                                    <div class="product_desc">
                                        <p>{{$p['desc']}}</p>
                                    </div>
                                    <div class="action_links list_action_right">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                    cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                        class="icon-heart"></i></a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="icon-sliders"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>

                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
<!--shop  area end-->

@endsection