<!DOCTYPE html>
<html data-bs-theme="light" class="d-flex justify-content-center align-items-center" lang="en" style="background: linear-gradient(45deg, #00DBDE 0%, #FC00FF 100%), #00DBDE;/*--bs-primary: #FC00FF;*//*--bs-primary-rgb: 252,0,255;*/">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="{{asset('ta/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{asset('ta/assets/css/bs-theme-overrides.css')}}">
</head>

<body class="bg-gradient-primary" style="background: rgba(78,115,223,0);transform-origin: center;">
    <div class="container" style="background: none;">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card shadow-lg o-hidden border-0 my-5" style="border-radius: 55.6px;">
                    <div class="card-body p-0 pe-lg-4 pb-lg-4 ps-lg-4 pt-lg-4">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex" style="background: rgba(231,74,59,0);">
                                <div class="flex-grow-1 bg-login-image justify-content-center align-items-center" style="/*position: static;*/display: flex;"><img class="mx-3" width="326" height="293" src="{{asset('ta/assets/img/business-salesman.gif')}}" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-6 col-xxl-6 offset-xl-0">
                                <div class="p-5">
                                    <div class="text-center"><img src="{{asset('ta/assets/img/Screenshot%202023-10-25%20221751.png')}}" style="width: 220px;margin-bottom: 24px;"></div>
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Create an Account!</h4>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Full Name" name="name" required></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail-1" aria-describedby="emailHelp" placeholder="Email Address" name="email" required></div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password" required></div>
                                            <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_confirmation" required></div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"><a class="small" href="{{ route('login') }}">Already have an account? Login!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('ta/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('ta/assets/js/bs-init.js')}}"></script>
    <script src="{{asset('ta/assets/js/theme.js')}}"></script>
</body>

</html>
