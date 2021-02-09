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

    </head>

    <body class="bg-dark">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('public/assets/images/logo-nc.png') }}" alt="Logo NC" width="150">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-header bg-primary text-center p-1">
                                <h4 class="text-center text-white d-flex justify-content-center align-items-center flex-column flex-sm-row">
                                    <i class="fas fa-microphone-alt fa-2x mr-2 mb-2 mb-sm-0"></i>
                                    <span class="font-weight-bold font-20">iSAC Speaking Full Test</span>
                                </h4>
                            </div>
                            <div class="card-body pt-1">
                                
                                <div class="text-center w-75 mx-auto">
                                    <p class="text-muted my-3">Enter your username and password to access <span class="font-weight-bold">iSAC Speaking Full Test</span>.</p>
                                </div>

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
                                        <button class="btn btn-bordered-primary width-md" type="submit"> Log In </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->

                    
                </div>
                <!-- end row -->
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