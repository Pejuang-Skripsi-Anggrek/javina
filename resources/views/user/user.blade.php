@extends('layout')

@section('content')

<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Tab panes -->
                <div class="" id="orders">
                    <h3>Accounts</h3>
                    <div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    </div>
                    <div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="card">
                                <div class="row mt-20 mb-20">
                                    <div class="col col-sm-2 ml-20">
                                        <img src="https://dummyimage.com/200x200/f0f0f0/0f0f0f.png&text=Profile+200x200" alt="">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row mb-10">
                                            <p class="font-bold">
                                                Biodata
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p>Nama</p>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$user['name']}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p>E-Mail</p>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$user['email']}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p>No. HP</p>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-auto mr-10">
                                                <img src="https://flagicons.lipis.dev/flags/4x3/id.svg" alt="" style="width:20px; height:auto">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="+62 856 9420 0000" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
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