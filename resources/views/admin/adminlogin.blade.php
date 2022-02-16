<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/adminlogin.css') !!}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="icon" href="{!! asset('assets/img/admin/logo.ico') !!}" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-6 col-xl-5 card flex-row mx-auto px-0" data-aos="zoom-in">
                <!-- <div class="img-left d-none d-md-flex"></div> -->
                <div class="card-body">
                    <h4 class="title text-center mt-4">
                        LOGIN ADMIN JAVINA
                    </h4>
                    @if (session('error'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                            aria-label="Warning:">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div class="ml-2">
                        {{ session('error') }}
                        </div>
                    </div>
                    @endif
                    <form class="form-box px-3" method="POST" action="/admin/masuk">
                        @csrf
                        <div class="form-input">
                            <span><i class="bi bi-envelope"></i></span>
                            <input id="email" type="email" name="email" placeholder="Email Address" tabindex="10"
                                required>
                        </div>
                        <div class="form-input">
                            <span><i class="bi bi-key"></i></span>
                            <input id="password" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block text-uppercase">
                                Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

</html>
