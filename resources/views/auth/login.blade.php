<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>iSAC Speaking</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card border">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-100 m-auto">
                                    <h4 class="text-center text-dark d-flex justify-content-center align-items-center flex-column flex-sm-row">
                                        <i class="fas fa-microphone-alt fa-2x mr-2 mb-2 mb-sm-0"></i>
                                        <span class="font-weight-bold font-20">iSAC Speaking</span>
                                    </h4>
                                    <h3 class="my-3"><ins>Teacher</ins></h3>
                                </div>

                                @php
                                    $errorsNotMatch = str_contains($errors->first('email'), 'These credentials') ? $errors->first('email') : '';
                                    $errorsEmail = str_contains($errors->first('email'), 'email') ? $errors->first('email') : '';
                                @endphp
                                
                                @if ($errorsNotMatch)
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ $errorsNotMatch  }}
                                    </div>
                                @endif
                               
                                <form action="{{ route('login') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group mb-3">
                                        <label for="email">Username</label>
                                        <input class="form-control {{ $errorsEmail ? 'is-invalid' : '' }}" type="text" id="email" name="email" placeholder="Username" value="{{ old('email') }}">
                                        @if ($errorsEmail)
                                            <div class="invalid-feedback">
                                                {{ $errorsEmail }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control @if($errors->has('password')) is-invalid @endif" type="password" id="password" name="password" placeholder="Password">
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <div class="checkbox">
                                            <input id="remember" type="checkbox" name="remember">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 mt-4 text-center">
                                        <button class="btn btn-bordered-dark width-md" type="submit"> Log In </button>
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


        <!-- Vendor js -->
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
        
    </body>
</html>