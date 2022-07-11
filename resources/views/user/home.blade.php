@extends('/layout')

@section('content')
<!-- Alert -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show row" role="alert" style="margin-bottom: 0px;">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        {{session('success')}}
    </div>
    <div class="col">
        <a type="button" class="close " data-dismiss="alert" aria-label="Close" style="justify-content:end;">
            <span aria-hidden="true">&times;</span>
        </a>
    </div>
</div>
@elseif(session('errors'))
<div class="alert alert-danger alert-dismissible fade show row" role="alert" style="margin-bottom: 0px;">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        {{session('errors')->first()}}
    </div>
    <div class="col">
        <a type="button" class="close " data-dismiss="alert" aria-label="Close" style="justify-content:end;">
            <span aria-hidden="true">&times;</span>
        </a>
    </div>
</div>
@endif
<!-- end of alert -->

<!--slider area start-->
<section class="slider_section">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg="{{$banner_img}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content" style="color: white">
                            <h1>{{$banner['name']}}</h1>
                            <p>Promo <b>30%</b> Akhir Tahun!</p>
                            <a class="button" href="/product/{{$banner['id']}}">Find Out Now! </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

<!--shipping area start-->
<div class="shipping_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <i class="fas fa-2x fa-globe-asia"></i>
                    </div>
                    <div class="shipping_content">
                        <h3>International Shipping</h3>
                        <p>Shipping around the world for all product</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping col_2">
                    <div class="shipping_icone">
                        <i class="fas fa-2x fa-money-bill-wave-alt"></i>
                    </div>
                    <div class="shipping_content">
                        <h3>Safe Payment</h3>
                        <p>With our payment gateway, don’t worry <br> about your information</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping col_3">
                    <div class="shipping_icone">
                        <i class="far fa-2x fa-handshake"></i>
                    </div>
                    <div class="shipping_content">
                        <h3>Friendly Services</h3>
                        <p>You have 30-day return guarantee for <br> every single order</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--product area start-->
<div class="product_area  mb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>Our Products</h2>
                    </div>
                    <div class="product_tab_btn">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#plant1" role="tab" aria-controls="plant1" aria-selected="true">
                                    Anggrek
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#plant2" role="tab" aria-controls="plant2" aria-selected="false">
                                    Bahan
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="plant1" role="tabpanel">
                <div class="row">
                    <div class="product_carousel product_column4 owl-carousel">
                        @foreach($bunga as $p)
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="/product/{{$p['id']}}"><img class="thumb_small" src="{{$product_dummy}}" alt=""></a>
                                        @if($p['diskon'] == 0)
                                        @else
                                        <div class="label_product">
                                            <span class="label_sale">{{$p['diskon']}}</span>
                                        </div>
                                        @endif
                                        <div class="product_timing">
                                            <div data-countdown="2022/12/15"></div>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="/product/{{$p['id']}}">{{$p['name']}}</a>
                                        </h4>
                                        <div class=" price_box">
                                            <span class="current_price">Rp.{{ number_format($p['spec'][0]['publish_price'])}}</span>
                                            @if($p['diskon'] == 0)
                                            @else
                                            <span class="old_price">Rp.{{ number_format($p['spec'][0]['base_price'])}}</span>
                                            @endif
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="plant2" role="tabpanel">
                <div class="row">
                    <div class="product_carousel product_column4 owl-carousel">
                        @foreach($bahan as $b)
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="/product/{{$p['id']}}"><img src="{{$product_dummy}}" alt="" class="thumb_small"></a>
                                        @if($b['diskon'] == 0)
                                        @else
                                        <div class="label_product">
                                            <span class="label_sale">{{$b['diskon']}}</span>
                                        </div>
                                        @endif
                                        <div class="product_timing">
                                            <div data-countdown="2022/12/15"></div>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="/product/{{$p['id']}}">{{$b['name']}}</a>
                                        </h4>
                                        <div class=" price_box">
                                            <span class="current_price">Rp.{{ number_format($b['spec'][0]['publish_price'])}}</span>
                                            @if($b['diskon'] == 0)
                                            @else
                                            <span class="old_price">Rp.{{ number_format($b['spec'][0]['base_price'])}}</span>
                                            @endif
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->

<!--product area start-->

<div class="product_area product_deals ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Today Deals</h2>
                </div>
            </div>
        </div>
        <div class="product_deals_container">
            <div class="row">
                <div class="product_carousel product_column5 owl-carousel">
                    @foreach($product as $p)
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="/product/{{$p['id']}}"><img src="{{$product_dummy}}" alt="" class="thumb_med"></a>
                                    @if($p['diskon'] == 0)
                                    @else
                                    <div class="label_product">
                                        <span class="label_sale">{{$p['diskon']}}</span>
                                    </div>
                                    @endif
                                    <div class=" product_timing">
                                        <div data-countdown="2022/12/15"></div>
                                    </div>
                                </div>
                                <figcaption class="product_content">
                                    <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="/product/{{$p['id']}}">{{$p['name']}}</a>
                                    </h4>
                                    <div class=" price_box">
                                        <span class="current_price">Rp.{{ number_format($p['spec'][0]['publish_price'])}}</span>
                                        @if($p['diskon'] == 0)
                                        @else
                                        <span class="old_price">Rp.{{ number_format($p['spec'][0]['base_price'])}}</span>
                                        @endif
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->

<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/productbig1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/productbig2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/productbig3.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/productbig4.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/product/product1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/product/product2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/product/product3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/product/product8.jpg" alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Donec Ac Tempus</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$64.99</span>
                                    <span class="old_price">$78.99</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                        laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                        in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                        recusandae </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>size</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="2" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->

<script type="text/javascript">
    jQuery(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });
</script>

@endsection