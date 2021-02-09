<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>iSAC Speaking Full Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('public/css/login.css') }}">
    </head>

    <body class="bg-dark">

        <div class="account-pages mt-2 mt-md-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-6">

                        <!-- Simple card -->
                        <div class="card overflow-hidden">
                            <div class="image-header">
                                <img src="{{ asset('public/assets/images/logo-nc.png') }}" alt="" class="img-logo">

                                <div class="middle">
                                    <span><i class="fas fa-microphone-alt"></i>SAC</span> Speaking Full Test
                                </div>

                                <div class="button-text">
                                    <h3 class="text-white">Sign In to access.</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(session('msg'))
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session('msg') }}
                                    </div>
                                @endif

                                <form action="{{ route('login.student') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group position-relative mb-3">
                                        <label for="username">Username</label>
                                        <input class="form-control @if($errors->has('username')) is-invalid @endif" type="text" id="username" name="username"  value="{{ old('username') }}" placeholder="Enter your username">
                                        @if ($errors->has('username'))
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group position-relative mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control @if($errors->has('password')) is-invalid @endif" type="password" id="password" name="password" placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-0 mt-4 text-center">
                                        <button class="btn btn-bordered-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            <span id="year"></span> &copy; iSAC Speaking Full Test by <a href="https://www.newcambridge.com" class="text-white">New Cambridge</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
        <script>
            const year = document.getElementById('year');
            const inputs = document.querySelectorAll('input');

            year.textContent = new Date().getFullYear();

            inputs.forEach(input => {
                input.addEventListener('keyup', () => {
                    input.classList.remove('is-invalid');
                    input.nextElementSibling.remove();
                })
            })
        </script>
        <!-- App js -->
        <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
        
    </body>
</html>