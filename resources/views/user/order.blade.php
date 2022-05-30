@extends('layout')

@section('content')

<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Tab panes -->
                <div class="" id="orders">
                    <h3>Orders</h3>
                    <div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    </div>
                    <div>
                        <div class="pb-20">
                            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-menunggu-tab" data-toggle="pill" href="#pills-menunggu" role="tab" aria-controls="pills-menunggu" aria-selected="true">
                                        Menunggu Konfirmasi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" nav-link" id="pills-diproses-tab" data-toggle="pill" href="#pills-diproses" role="tab" aria-controls="pills-diproses" aria-selected="false">
                                        Sedang Diproses
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-dikirim-tab" data-toggle="pill" href="#pills-dikirim" role="tab" aria-controls="pills-dikirim" aria-selected="false">
                                        Dalam Pengiriman
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab" aria-controls="pills-selesai" aria-selected="false">
                                        Selesai
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-menunggu" role="tabpanel" aria-labelledby="pills-menunggu-tab">
                                <div class="card">
                                    @if(!empty($transaction_success))
                                    <div class="container mb-20">
                                        @foreach($transaction_success as $c)
                                        <div class="row mt-20 mb-20">
                                            <div class="col-sm-10">
                                                <p class="font-bold">
                                                    {{date_format(date_create($c['created_at']), "d F Y")}}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    {{$c['payment_status']}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a><img src="http://via.placeholder.com/100x100"></a>
                                            </div>
                                            <div class="col-sm-8 align-self-end">
                                                <div class="row">
                                                    <a class="font-bold">
                                                        {{$c['list_product'][0]['name']}}
                                                    </a>
                                                </div>
                                                <div class="row">
                                                    <p>
                                                        + 1 Barang Lain
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 align-self-end">
                                                <div class="row">
                                                    <p>
                                                        Total Belanja
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="font-bold">
                                                        Rp. {{number_format($c['total_price'])}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($transaction_success)>1)
                                        <hr>
                                        @endif
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="container mb-20 mt-50">
                                        <div class="row">
                                            <h2 class="text-center font-bold">
                                                Tidak Ada Pesanan Yang Menunggu Konfirmasi
                                            </h2>
                                        </div>
                                        <div class="row img-resp">
                                            <img src="{!! asset('images/08-Delivery-Man.png') !!}" alt="">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-diproses" role="tabpanel" aria-labelledby="pills-diproses-tab">
                                <div class="card">
                                    @if(!empty($confirm_waiting))
                                    <div class="container mb-20">
                                        @foreach($confirm_waiting as $c)
                                        <div class="row mt-20 mb-20">
                                            <div class="col-sm-10">
                                                <p class="font-bold">
                                                    {{date_format(date_create($c['created_at']), "d F Y")}}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    {{$c['payment_status']}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a><img src="http://via.placeholder.com/100x100"></a>
                                            </div>
                                            <div class="col-sm-8 align-self-end">
                                                <div class="row">
                                                    <a class="font-bold">
                                                        {{$c['list_product'][0]['name']}}
                                                    </a>
                                                </div>
                                                <div class="row">
                                                    <p>
                                                        + 1 Barang Lain
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 align-self-end">
                                                <div class="row">
                                                    <p>
                                                        Total Belanja
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="font-bold">
                                                        Rp. {{number_format($c['total_price'])}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($confirm_waiting)>1)
                                        <hr>
                                        @endif
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="container mb-20 mt-50">
                                        <div class="row">
                                            <h2 class="text-center font-bold">
                                                Tidak Ada Pesanan Yang Sedang Diproses
                                            </h2>
                                        </div>
                                        <div class="row img-resp">
                                            <img src="{!! asset('images/08-Delivery-Man.png') !!}" alt="">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-dikirim" role="tabpanel" aria-labelledby="pills-dikirim-tab">
                                <div class="card">
                                    @if(!empty($order_sent))
                                    <div class="container mb-20">
                                        @foreach($order_sent as $c)
                                        <div class="row mt-20 mb-20">
                                            <div class="col-sm-10">
                                                <p class="font-bold">
                                                    {{date_format(date_create($c['created_at']), "d F Y")}}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    {{$c['payment_status']}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a><img src="http://via.placeholder.com/100x100"></a>
                                            </div>
                                            <div class="col-sm-8 align-self-end">
                                                <div class="row">
                                                    <a class="font-bold">
                                                        {{$c['list_product'][0]['name']}}
                                                    </a>
                                                </div>
                                                <div class="row">
                                                    <p>
                                                        + 1 Barang Lain
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 align-self-end">
                                                <div class="row">
                                                    <p>
                                                        Total Belanja
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="font-bold">
                                                        Rp. {{number_format($c['total_price'])}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($order_sent)>1)
                                        <hr>
                                        @endif
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="container mb-20 mt-50">
                                        <div class="row">
                                            <h2 class="text-center font-bold">
                                                Tidak Ada Pesanan Yang Dalam Pengiriman
                                            </h2>
                                        </div>
                                        <div class="row img-resp">
                                            <img src="{!! asset('images/08-Delivery-Man.png') !!}" alt="">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
                                <div class="card">
                                    @if(!empty($order_done))
                                    <div class="container mb-20">
                                        @foreach($order_done as $c)
                                        <div class="row mt-20 mb-20">
                                            <div class="col-sm-10">
                                                <p class="font-bold">
                                                    {{date_format(date_create($c['created_at']), "d F Y")}}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    {{$c['payment_status']}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a><img src="http://via.placeholder.com/100x100"></a>
                                            </div>
                                            <div class="col-sm-8 align-self-end">
                                                <div class="row">
                                                    <a class="font-bold">
                                                        {{$c['list_product'][0]['name']}}
                                                    </a>
                                                </div>
                                                <div class="row">
                                                    <p>
                                                        + 1 Barang Lain
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 align-self-end">
                                                <div class="row">
                                                    <p>
                                                        Total Belanja
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="font-bold">
                                                        Rp. {{number_format($c['total_price'])}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($order_done)>1)
                                        <hr>
                                        @endif
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="container mb-20 mt-50">
                                        <div class="row">
                                            <h2 class="text-center font-bold">
                                                Tidak Ada Pesanan Yang Telah Selesai
                                            </h2>
                                        </div>
                                        <div class="row img-resp">
                                            <img src="{!! asset('images/08-Delivery-Man.png') !!}" alt="">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab_diproses" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->

@endsection

<script>
    function spec_click() {
        $('div a').click(function(e) {
            $('a.active').removeClass('active');
            $(this).addClass('active');
        });
    }
</script>