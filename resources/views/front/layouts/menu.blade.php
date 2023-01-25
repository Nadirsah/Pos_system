

<body>

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="{{route('index')}}" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1>{{$header->name}}</h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="{{route('index')}}">Əsas Səhifə</a></li>
        @foreach($page as $pages)
        <li><a href="{{route('pages',$pages->slug)}}">{{$pages->name}}</a></li>
       @endforeach
        <!-- <li class="dropdown"><a href="category.html"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="search-result.html">Search Result</a></li>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
        <li><a href="contact.html">Çatdırılma</a></li>
        <!-- <li><a href="about.html">About</a></li> -->
        <li><a href="contact.html">Əlaqə</a></li>
      </ul>
    </nav><!-- .navbar -->

    <div class="position-relative">
      @php $sosials=['facebook','instagram'];
      @endphp
      @foreach($sosials as $sosial)
      @if($header->$sosial!=null)
      <a target="_blank" href="{{$header->$sosial}}" class="mx-2"><span class="bi-{{$sosial}}" ></span></a>
      @endif
      @endforeach
    
     

      <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
      <i class="bi bi-list mobile-nav-toggle"></i>

      <!-- ======= Search Form ======= -->
      <div class="search-form-wrap js-search-form-wrap">
        <form action="{{route('search')}}" method="GET" class="search-form">
          <span class="icon bi-search"></span>
          <input type="text" placeholder="Axtar" name="search" class="form-control">
          <button type="submit" >Axtar</button>
        </form>
      </div><!-- End Search Form -->

    </div>

  </div>
  
</header><!-- End Header -->




