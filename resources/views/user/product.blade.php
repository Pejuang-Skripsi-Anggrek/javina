@extends('/layout')

@section('content')

<!--product details start-->
<div class="product_details mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <!-- harus 600x600 otherwise memanjang -->
                            <img id="zoom1" src="https://images.unsplash.com/photo-1583846712268-a77d97b7fd68?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=735&q=80" data-zoom-image="https://images.unsplash.com/photo-1583846712268-a77d97b7fd68?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=735&q=80" alt="big-1">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="/cartadd/{{$product['id']}}" method="POST">
                        @csrf
                        <h1>{{$product['name']}}</h1>
                        <!-- <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li class="review"><a href="#"> (customer review ) </a></li>
                            </ul>

                        </div> -->
                        <div class="price_box">
                            <span class="current_price">Rp. {{number_format($product['publish_price'])}}</span>
                            @if($product['diskon'] == null)
                            @else
                            <span class="old_price">Rp. {{number_format($product['base_price'])}}</span>
                            @endif

                        </div>
                        <div class="product_desc">
                            <p> </p>
                        </div>
                        <div class="product_variant quantity">
                            <label>quantity</label>
                            <input min="1" max="100" name="qty" type="number" value="1">
                            <button class="button" type="submit" value="Add to Cart">Add to Cart</button>

                        </div>
                        <div class="product_meta">
                            <span>Category: {{$product['catalog']}}<a href="#"></a></span>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product_d_inner">
                                    <div class="product_info_button">
                                        <ul class="nav" role="tablist" id="nav-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                                            <div class="product_info_content">
                                                <p>{{$product['desc']}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                                            <div class="product_d_table">
                                                <form action="#">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="first_child">Compositions</td>
                                                                <td>Polyester</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="first_child">Styles</td>
                                                                <td>Girly</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="first_child">Properties</td>
                                                                <td>Short Dress</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="product_info_content">
                                                <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                                    feminine designs delivering stylish separates and statement dresses which have
                                                    since evolved into a full ready-to-wear collection in which every item is a
                                                    vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
                                                    youthful elegance and unmistakable signature style. All the beautiful pieces are
                                                    made in Italy and manufactured with the greatest attention. Now Fashion extends
                                                    to a range of accessories including shoes, hats, belts and more!</p>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                                            <div class="reviews_wrapper">
                                                <h2>1 review for Donec eu furniture</h2>
                                                <div class="reviews_comment_box">
                                                    <div class="comment_thmb">
                                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                                    </div>
                                                    <div class="comment_text">
                                                        <div class="reviews_meta">
                                                            <div class="star_rating">
                                                                <ul>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p><strong>admin </strong>- September 12, 2018</p>
                                                            <span>roadthemes</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="comment_title">
                                                    <h2>Add a review </h2>
                                                    <p>Your email address will not be published. Required fields are marked </p>
                                                </div>
                                                <div class="product_ratting mb-10">
                                                    <h3>Your rating</h3>
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product_review_form">
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="review_comment">Your review </label>
                                                                <textarea name="comment" id="review_comment"></textarea>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="author">Name</label>
                                                                <input id="author" type="text">

                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="email">Email </label>
                                                                <input id="email" type="text">
                                                            </div>
                                                        </div>
                                                        <button type="submit">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->

<!--product info end-->

<!--product area start-->
<section class="product_area related_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Related Products </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product_carousel product_column4 owl-carousel">
                @foreach($allProduct as $p)
                <div class="col-lg-3">
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <a class="primary_img" href="/product/{{$p['id']}}"><img src="https://images.unsplash.com/photo-1583846712268-a77d97b7fd68?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=735&q=80" alt=""></a>
                                @if($p['diskon'] == null)
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
                                <h4 class="product_name"><a href="product-details.html">{{$p['name']}}</a>
                                </h4>
                                <div class=" price_box">
                                    <span class="current_price">Rp.{{ number_format($p['publish_price'])}}</span>
                                    @if($p['diskon'] == null)
                                    @else
                                    <span class="old_price">Rp.{{ number_format($p['base_price'])}}</span>
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
</section>
<!--product area end-->
@endsection