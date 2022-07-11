<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Isi Taman </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('assets/img/logo_trans.png') !!}">

    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{!! asset('assets/css/owl.carousel.min.css') !!}">
    <!--slick min css-->
    <link rel="stylesheet" href="{!! asset('assets/css/slick.css') !!}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{!! asset('assets/css/magnific-popup.css') !!}">
    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{!! asset('assets/css/font.awesome.css') !!}">
    <!--animate css-->
    <link rel="stylesheet" href="{!! asset('assets/css/animate.css') !!}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{!! asset('assets/css/jquery-ui.min.css') !!}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{!! asset('assets/css/slinky.menu.css') !!}">
    <!--plugins css-->
    <link rel="stylesheet" href="{!! asset('assets/css/plugins.css') !!}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">

    <!--modernizr min js here-->
    <script src="{!! asset('assets/js/vendor/modernizr-3.7.1.min.js') !!}"></script>

    <!-- JQuery -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="icon-x"></i></a>
                        </div>
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="0">All Catalog</option>
                                        <option value="1">Flowers</option>
                                        <option value="2">Seeds</option>
                                        <option value="3">Materials</option>
                                        <option value="4">Tools </option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="call-support">
                            <p>Call Support: <a href="tel:0123456789">0123456789</a></p>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li>
                                    <a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('cart') ? 'active' : '' }}" href="/cart">Cart</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('user') ? 'active' : '' }}" href="/user">Account</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('transaction') ? 'active' : '' }}" href="/transaction">Orders</a>
                                </li>

                                @if(!empty(session()->get('coba')))
                                <li><a href="/logout" style="color: red;">Logout</a></li>
                                @else
                                <li><a href="/login">Login</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> demo@example.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--offcanvas menu area end-->
    <header>
        <div class="main_header">
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-4">
                            <div class="logo">
                                <a href="/"><img src="{!! asset('assets/img/logo_trans.png') !!}" alt="" style="height:96px"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 col-6">
                            <div class="header_right_info">
                                <div class="search_container">
                                    <form action="#">
                                        <div class="hover_category">
                                            <select class="select_option" name="select" id="categori1">
                                                <option selected value="0">All Catalog</option>
                                                <option value="1">Flowers</option>
                                                <option value="2">Seeds</option>
                                                <option value="3">Materials</option>
                                                <option value="4">Tools </option>
                                            </select>
                                        </div>
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text">
                                            <button type="submit"><i class="icon-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="header_account_area">
                                    <div class="header_account-list top_links">
                                        <a href=""><i class="icon-users"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="/user">My Account </a></li>
                                            <li><a href="/cart">Shopping Cart</a></li>
                                            <li><a href="/transaction">Order</a></li>
                                            <div class="dropdown-divider"></div>
                                            @if(!empty(session()->get('coba')))
                                            <li><a href="/logout" style="color: red;">Logout</a></li>
                                            @else
                                            <li><a href="/login">Login</a></li>
                                            @endif

                                        </ul>
                                    </div>
                                    <!-- <div class="header_account-list header_wishlist">
                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                    </div> -->
                                    <div class="header_account-list">
                                        <a href="/cart"><i class="icon-shopping-bag"></i><span class="item_count"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">Catalog</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                        <li><a href="/catalog/1"> Flowers</a></li>
                                        <li><a href="/catalog/2"> Seeds</a></li>
                                        <li><a href="/catalog/3"> Materials</a></li>
                                        <li><a href="/catalog/4"> Tools</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!--main menu start-->
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li>
                                            <a class="{{ Request::is('/') ? 'active' : '' }}" href="/">home</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::is('cart') ? 'active' : '' }}" href="/cart">Cart</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::is('user') ? 'active' : '' }}" href="/user">Account</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::is('transaction') ? 'active' : '' }}" href="/transaction">Order</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="call-support">
                                <p>Call Support: <a href="tel:0123456789">0123456789</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->
    @yield('content')
    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container contact_us">
                            <h3>Opening Time</h3>
                            <p><span>Mon - Fri:</span> 8AM - 10PM</p>
                            <p><span>Sat:</span> 9AM-8PM</p>
                            <p><span>Suns:</span> 14hPM-18hPM</p>
                            <p><b>We Work All The Holidays</b></p>
                        </div>
                    </div>
                    <!-- Information -->
                    <!-- <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->

                    <!-- Mid -->
                    <div class="col-lg-4 col-md-5">
                        <div class="widgets_container widget_app">
                            <div class="footer_logo">
                                <a href="index.html"><img src="{!! asset('assets/img/logo_trans.png') !!}" alt=""></a>
                            </div>
                            <div class="footer_widgetnav_menu">
                                <ul>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Internet</a></li>
                                </ul>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <!-- <div class="footer_app">
                                <ul>
                                    <li><a href="#"><img src="{!! asset('assets/img/icon/icon-app.jpg') !!}" alt=""></a></li>
                                    <li><a href="#"><img src="{!! asset('assets/img/icon/icon1-app.jpg') !!}" alt=""></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>

                    <!-- My Account -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>My Account</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="/user">My Account</a></li>
                                    <li><a href="/cart">Shopping cart</a></li>
                                    <li><a href="/transaction">Order</a></li>
                                    <li><a href="/checkout">Checkout</a></li>
                                    <li><a href="/">Shop</a></li>
                                    <!-- <li><a href="#">Order History</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- CS -->
                    <!-- <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Customer Service</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="contact.html">Site Map</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p class="copyright-text">&copy; 2021 <a href="index.html">Javina</a>. Made with <i class="fa fa-heart text-danger"></i> </p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment">
                            <a href="#"><img src="{!! asset('assets/img/icon/payment.png') !!}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->


    <!-- JS
============================================ -->
    <!--jquery min js-->
    <script src="{!! asset('assets/js/vendor/jquery-3.4.1.min.js') !!}"></script>
    <!--popper min js-->
    <script src="{!! asset('assets/js/popper.js') !!}"></script>
    <!--bootstrap min js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
    <!--owl carousel min js-->
    <script src="{!! asset('assets/js/owl.carousel.min.js') !!}"></script>
    <!--slick min js-->
    <script src="{!! asset('assets/js/slick.min.js') !!}"></script>
    <!--magnific popup min js-->
    <script src="{!! asset('assets/js/jquery.magnific-popup.min.js') !!}"></script>
    <!--counterup min js-->
    <script src="{!! asset('assets/js/jquery.counterup.min.js') !!}"></script>
    <!--jquery countdown min js-->
    <script src="{!! asset('assets/js/jquery.countdown.js') !!}"></script>
    <!--jquery ui min js-->
    <script src="{!! asset('assets/js/jquery.ui.js') !!}"></script>
    <!--jquery elevatezoom min js-->
    <script src="{!! asset('assets/js/jquery.elevatezoom.js') !!}"></script>
    <!--isotope packaged min js-->
    <script src="{!! asset('assets/js/isotope.pkgd.min.js') !!}"></script>
    <!--slinky menu js-->
    <script src="{!! asset('assets/js/slinky.menu.js') !!}"></script>
    <!-- Plugins JS -->
    <script src="{!! asset('assets/js/plugins.js') !!}"></script>

    <!-- Main JS -->
    <script src="{!! asset('assets/js/main.js') !!}"></script>

</body>

</html>