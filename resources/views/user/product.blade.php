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
                            <img id="zoom1" src="{{$product['list_picture'][0]['url']}}"
                                data-zoom-image="{{$product['list_picture'][0]['url']}}" alt="big-1" width="100%">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="/cartadd/{{$product['id']}}" method="POST">
                        @csrf
                        <div>

                        </div>
                        <h1>{{$product['name']}}</h1>
                        <div style="float: right">
                            <a href="" data-toggle="modal" data-target="#exampleModal">
                                <h4>QR</h4>
                            </a>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$product['name']}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{$sku['qrcode']}}" alt="" style="height: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>

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
                            <span class="current_price">Rp.
                                {{number_format($product['spec'][0]['publish_price'])}}</span>
                            @if($product['diskon'] == 0)
                            @else
                            <span class="old_price">Rp. {{number_format($product['spec'][0]['base_price'])}}</span>
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
                            @foreach($product['spec'] as $spec)
                            <button class="btn btn-outline-success">
                                <tr>
                                    <td class="first_child" style="text-transform: capitalize;">
                                        {{$spec['name_spec']}}
                                    </td>
                                    <td>
                                        Rp. {{number_format($spec['publish_price'])}}
                                    </td>
                                </tr>
                            </button>
                            @endforeach
                        </div>
                        <div class="product_meta">
                            <span>Category: @foreach($product['list_detail_catalog'] as $p)
                                <a href="#">{{$p['name']}}</a> @endforeach</span>
                        </div>
                        <div class="product_meta">
                            <span>Color:
                                <a href="#">{{$product['warna']}}</a> </span>
                        </div>
                        <div class="product_meta">
                            <span>Jenis:
                                <a href="#">{{$product['jenis']}}</a> </span>
                        </div>
                </div>
                <div class="product_meta">
                    <span>Stock:
                        <a href="#">{{$product['stok']}}</a></span>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist" id="nav-tab">
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#info" role="tab"
                                            aria-controls="info" aria-selected="false">Description</a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                            aria-selected="false">Specification</a>
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
                                                    @foreach($product['info'] as $info)
                                                    <tr>
                                                        <td class="first_child" style="text-transform: capitalize;">
                                                            {{$info['parameter']}}
                                                        </td>
                                                        <td style="text-transform: capitalize;">
                                                            {{$info['value']}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="product_info_content">
                                        <div class="product_d_table">
                                            <table>
                                                <tbody>

                                                </tbody>
                                            </table>
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
                                <a class="primary_img" href="/product/{{$p['id']}}"><img
                                        src="{{$p['list_picture'][0]['url']}}" alt=""></a>
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
                                    <span
                                        class="current_price">Rp.{{ number_format($p['spec'][0]['publish_price'])}}</span>
                                    @if($p['diskon'] == null)
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
</section>
<!--product area end-->
@endsection