<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{route('index')}}">
                {{$header->name}}
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index')}}">Əsas səhifə</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Haqqımızda</a>
                        </li>
                        <div class="dropdown ">
                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Kategoriyalar
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach($page as $pages)
                                <li class="nav-item"><a class="nav-link"
                                        href="{{route('pages',$pages->slug)}}">{{$pages->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Əlaqə</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Çatdırılma</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <form action="{{route('search')}}" method="GET" class="modal-content modal-body border-0 p-0">

                            <div class="input-group mb-2">
                                <input type="search" name="search" class="form-control" id="inputModalSearch"
                                    placeholder="Axtar ...">
                                <button type="submit" class="input-group-text bg-success text-light">
                                    <i class="fa fa-fw fa-search text-white"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <!-- sosail -->
                    @php $sosials=['facebook','instagram'];
                    @endphp
                    @foreach($sosials as $sosial)
                    @if($header->$sosial!=null)
                    <a class="text-black" target="_blank" href="{{$header->$sosial}}" class="mx-2">
                        <i class="fa-brands fa-{{$sosial}} fa-lg fa-fw me-2"></i></a>
                    @endif
                    @endforeach
                    <!-- end sosail -->

                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="GET" class="modal-content modal-body border-0 p-0">

                <div class="input-group mb-2">
                    <input type="search" name="search" class="form-control" id="inputModalSearch"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>