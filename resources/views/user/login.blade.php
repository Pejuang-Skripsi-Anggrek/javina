@extends('/layout')

@section('content')
<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <!--login area start-->
            <div class="col-md-6">
                <div class="account_form">
                    <h2>login</h2>
                    <form method="POST" action="/masuk">
                        @csrf
                        <p>
                            <label>Username or email <span>*</span></label>
                            <input name="email" id="email" type="text">
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input name="password" id="password" type="password">
                        </p>
                        <div class="login_submit">
                            <a type="button" href="/register">Belum Punya Akun?</a>
                            <!-- <label for="remember">
                                <input id="remember" type="checkbox">
                                Remember me
                            </label> -->
                            <button type="submit">login</button>
                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

        </div>
    </div>
</div>
<!-- customer login end -->

@endsection