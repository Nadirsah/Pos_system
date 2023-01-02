<body>
    <header>
      <div class="container">
        <div class="row1">
          <h1>Naxçıvan Muxtar Respublikası</h1>
          <ul class="language-selector">
            <li>
              <img
                src="https://static.vecteezy.com/system/resources/previews/011/571/364/non_2x/circle-flag-of-azerbaijan-free-png.png"
                alt=""
              />
            </li>
            <li>
              <img
                src="https://static.vecteezy.com/system/resources/previews/012/658/302/original/flag-of-russia-on-the-circle-shape-flag-of-russia-flag-of-the-russian-federation-format-png.png"
                alt=""
              />
            </li>
            <li>
              <img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/United-kingdom_flag_icon_round.svg/2048px-United-kingdom_flag_icon_round.svg.png"
                alt=""
              />
            </li>
          </ul>
        </div>
        <div class="bar"></div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav row">
              <li class="nav-item col-sm {{(request()->segment(1)=='tebiet') ? 'active': ''}}">
                <a class="nav-link" href="{{route('tebiet')}}"
                  >Təbiət<span class="sr-only">(current)</span></a
                >
              </li>
              <li class="nav-item col-sm {{(request()->segment(1)=='tarix') ? 'active': ''}}">
                <a class="nav-link" href="{{route('tarix')}}"
                  >Tarix<span class="sr-only">(current)</span></a
                >
              </li>
              <li class="nav-item col-sm {{(request()->segment(1)=='iqtisadiyyat') ? 'active': ''}}">
                <a class="nav-link" href="{{route('iqtisadiyyat')}}"
                  >İqtisadiyyat<span class="sr-only">(current)</span></a
                >
              </li>
              <li class="nav-item col-sm {{(request()->segment(1)=='medeniyyet') ? 'active': ''}}">
                <a class="nav-link" href="{{route('medeniyyet')}}"
                  >Mədəniyyət<span class="sr-only">(current)</span></a
                >
              </li>
              <li class="nav-item col-sm {{(request()->segment(1)=='elm_tehsil') ? 'active': ''}}">
                <a class="nav-link" href="{{route('elm_tehsil')}}"
                  >Elm və təhsil<span class="sr-only">(current)</span></a
                >
              </li>
              <li class="nav-item col-sm {{(request()->segment(1)=='sehiyye') ? 'active': ''}}">
                <a class="nav-link" href="{{route('sehiyye')}}"
                  >Səhiyyə<span class="sr-only">(current)</span></a
                >
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>