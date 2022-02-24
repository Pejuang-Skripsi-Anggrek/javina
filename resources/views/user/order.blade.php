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
                        <div style="padding-bottom: 10px;">
                            <a class="btn btn-outline-primary active" onclick="spec_click()" name="menunggu"
                                data-bs-toggle="tab" href="#tab_menunggu" aria-controls="nav-home" aria-selected="true">
                                Menunggu Konfirmasi
                            </a>
                            <a class=" btn btn-outline-primary" onclick="spec_click()" name="diproses"
                                data-bs-toggle="tab" href="#tab_diproses">
                                Sedang Diproses
                            </a>
                            <a class="btn btn-outline-primary" onclick="spec_click()" name="pengiriman">
                                Dalam Pengiriman
                            </a>
                            <a class="btn btn-outline-primary" onclick="spec_click()" name="selesai">
                                Selesai
                            </a>
                        </div>
                        <div class="tab-pane fade show active" id="tab_menunggu" role="tabpanel">
                            <div class="card">
                                <div class="container" style="padding-bottom:20px">
                                    @foreach($transaction_success as $c)
                                    <div class="row" style="margin-top:10px; margin-bottom: 10px">
                                        <div class="col-sm-8">
                                            <p style="font-weight:500;">
                                                {{$c['created_at']}}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p>
                                                {{$c['order']['order_status']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a><img src="http://via.placeholder.com/100x100"></a>
                                        </div>
                                        <div class="col-sm-8 align-self-end" style=" margin-left: -20px;">
                                            <div class="row">
                                                <a style="font-weight:500;">
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
                                                <p style="font-weight:500;">
                                                    Rp. {{number_format($c['total_price'])}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
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