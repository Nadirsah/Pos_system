<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Qeydiyyat </title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('back/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('back/')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">

                    <div class="col-lg-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Hesab yaradin!</h1>
                            </div>
                            <form class="user" method="Post" action="{{route('admin.register.store')}}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="name" value="{{old('name')}}"
                                            class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Istifadeci adi">
                                        <span
                                            class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                    </div>

                                </div>

                               

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Sifre">
                                        <span
                                            class="text-danger">@error('password'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                    </div>

                                </div>

                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Qeydiyyatdan kecin
                                </button>

                            </form>



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

</body>

</html>