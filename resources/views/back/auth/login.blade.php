<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daxil ol</title>



    <!-- Custom fonts for this template-->
    <link href="{{asset('back/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('back/')}}/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-xl-5 col-lg-6 col-md-9 ">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center ">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12 ">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Xos gelmisiz!</h1>
                                        @if($errors->any())
                                        <div class="alert alert-danger">{{$errors->first()}}</div>
                                        @endif 

                                    </div>
                                    <form class="user" action="{{route('admin.login.store')}}" method="Post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="name" value="{{old('name')}}"
                                                aria-describedby="emailHelp" placeholder="Istifadeci adi">
                                            <span
                                                class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Sifre">
                                            <span
                                                class="text-danger">@error('password'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                        </div>
                                        @if(config("services.recaptcha.key"))
                                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">
                                        </div>
                                        @endif
                                        <span
                                            class="text-danger">@error('g-recaptcha-response'){{'Giriş tamamlanmadı!'}}@enderror</span>



                                        <button type="submit" class="btn btn-primary btn-user btn-block"> Daxil
                                            ol</button>

                                      

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>