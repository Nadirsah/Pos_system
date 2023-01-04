@extends("front.layouts.master")
@section('content')
    <section class="general-info">
      <div class="banner">
     
        <div class="sub-ban">
          <h2></h2>
          <p>
          
          </p>
        </div>
       
      </div>
      <div class="headlines"></div>
      <div class="container head-part">
        <h2>Naxçıvan Muxtar Respublikası</h2>

        <div class="nakhchivan-nav">
          <ul class="info-nav">
            <li num="1" id="city">Şəhər və rayonlar</li>
            <li num="2" class="active-banner" id="area">Ərazi</li>
            <li num="3" id="people">Əhali</li>
          </ul>
          <div class="prog-bar">
            <div class="bar-line"></div>
          </div>
        </div>
      </div>
      <div class="container content">
        <div class="photos-text">
          <img id="area-photo" src="{{asset('front/')}}/img/Nax-MR 1.png" alt="" />
          <p id="change-text">
            t is a long established fact that a reader will be distracted by the
            readable content of a page when looking at its layout. The point of
            using Lorem Ipsum is that it has a more-or-less normal distribution
            of letters, as opposed to using 'Content here, content here', making
            it look like readable English. t is a long established fact that a
            reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has
            a more-or-less normal distribution of letters, as opposed to using
            'Content here, content here', making it look like readable English.
          </p>
        </div>
      </div>
    </section>

    <section class="news">
      <div class="container">
        <div class="heading">
          <h2>Xəbərlər</h2>
        </div>
        <div class="swiper mySwiper news-slider">
          <div class="swiper-wrapper">
            @foreach($xeber as $xebers)
            <div class="swiper-slide">
              <div class="new">
                <div class="thumb">
                  <img src="{{asset($xebers->img)}}" alt="" />
                </div>
                <div class="news-content">
                  <p>
                    {!!$xebers->content!!}
                  </p>
                  <div>
                    <div class="vector-icon">
                    <a href="{{route('news',$xebers->id)}}"><i class="fa-solid fa-chevron-right"></i></a>
                    </div>
                    <h6>{{$xebers->created_at->format('d-m-Y')}}</h6>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </section>

    <section class="Karabakh" style="background-image:url('{{asset('front/img/Rectangle 414.png')}}');">
      <div class="title">
        <h4>QARABAĞ</h4>
      </div>
      <div class="swiper mySwiper karabakh-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="new-links">
              <h3>Qarabağ tarixi</h3>
              <p>
                Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən
                qədim tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx
                mağarasında ən qədim insanların yaşayış məskəni aşkar
                edilmişdir...
              </p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="new-links">
              <h3>Qarabağ tarixi</h3>
              <p>
                Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən
                qədim tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx
                mağarasında ən qədim insanların yaşayış məskəni aşkar
                edilmişdir...
              </p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="new-links">
              <h3>Qarabağ tarixi</h3>
              <p>
                Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən
                qədim tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx
                mağarasında ən qədim insanların yaşayış məskəni aşkar
                edilmişdir...
              </p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="new-links">
              <h3>Qarabağ tarixi</h3>
              <p>
                Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən
                qədim tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx
                mağarasında ən qədim insanların yaşayış məskəni aşkar
                edilmişdir...
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="new-links">
        <h3>Qarabağ tarixi</h3>
        <p>
          Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən qədim
          tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx mağarasında ən
          qədim insanların yaşayış məskəni aşkar edilmişdir...
        </p>
      </div>
      <div class="new-links">
        <h3>Qarabağ tarixi</h3>
        <p>
          Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən qədim
          tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx mağarasında ən
          qədim insanların yaşayış məskəni aşkar edilmişdir...
        </p>
      </div>
      <div class="new-links">
        <h3>Qarabağ tarixi</h3>
        <p>
          Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən qədim
          tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx mağarasında ən
          qədim insanların yaşayış məskəni aşkar edilmişdir...
        </p>
      </div>
      <div class="new-links">
        <h3>Qarabağ tarixi</h3>
        <p>
          Qarabağ təkcə Azərbaycanın deyil, ümumiyyətlə, dünyanın da ən qədim
          tarixə malik olan diyarlarındandır. Bu ərazidəki Azıx mağarasında ən
          qədim insanların yaşayış məskəni aşkar edilmişdir...
        </p>
      </div> -->
    </section>

    <div class="section websites-slider">
      <div class="swiper mySwiper website-slide">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="website t1">
              <img src="{{asset('front/')}}/img/Rectangle 430.png" alt="" />
              <div class="head">
                <div class="second-head">
                  <a href="">president.az</a>
                  <img src="{{asset('front/')}}/img/Polygon 8.png" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="website t2">
              <img src="{{asset('front/')}}/img/Rectangle 432.png" alt="" />
              <div class="head">
                <div class="second-head">
                  <a href="">mehriban-aliyeva.az</a>
                  <img src="{{asset('front/')}}/img/Polygon 9.png" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="website t1">
              <img src="{{asset('front/')}}/img/Rectangle 434.png" alt="" />
              <div class="head">
                <div class="second-head">
                  <a href="">alimeclis.az</a>
                  <img src="{{asset('front/')}}/img/Polygon 8.png" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="website t2">
              <img src="{{asset('front/')}}/img/Rectangle 433.png" alt="" />
              <div class="head">
                <div class="second-head">
                  <a href="">nmincom.gov.az</a>
                  <img src="{{asset('front/')}}/img/Polygon 9.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="newspaper container">
      <img src="{{asset('front/')}}/img/Capture 1.png" alt="" />
      <img src="{{asset('front/')}}/img/Capture2 1.png" alt="" />
    </section>
    <section class="latest">
      <div class="container">
        <div class="left">
          <div class="header">
            <h2>Rəsmi xronika</h2>
          </div>
          <div class="photo">
            <img src="{{asset('front/')}}/img/Rectangle 442.png" alt="" />
          </div>
          <div class="paragraph">
            <p>
              Naxçıvan Muxtar Respublikasında Azərbaycan Respublikası
              Prezidentinin səlahiyyətli nümayəndəsi Fuad Nəcəfli Əlahiddə
              Ümumqoşun Orduda olub, xidmət şəraiti ilə maraqlanıb.
            </p>
          </div>
        </div>
        <div class="right">
          <div class="header">
            <h2>Son Xəbərlər</h2>
          </div>
          <div class="news-col">
            <div class="news1">
              <div class="pic">
                <img src="{{asset('front/')}}/img/Rectangle 443.png" alt="" />
              </div>
              <div class="texts">
                <h5>
                  Prezident İlham Əliyev Bakıda 5 saylı DOST Mərkəzinin
                  açılışında iştirak edib.
                </h5>
                <p>
                  Azərbaycan Respublikasının Prezidenti İlham Əliyev dekabrın
                  28-də Əmək və Əhalinin Sosial Müdafiəsi Nazirliyinin
                  tabeliyində olan Dayanıqlı və Operativ Sosial Təminat
                  Agentliyinin Bakının Xətai rayonunda yerləşən 5 saylı DOST
                  Mərkəzinin açılışında iştirak edib.
                </p>
              </div>
            </div>
            <div class="news1">
              <div class="pic">
                <img src="{{asset('front/')}}/img/Rectangle 443.png" alt="" />
              </div>
              <div class="texts">
                <h5>
                  Prezident İlham Əliyev Bakıda 5 saylı DOST Mərkəzinin
                  açılışında iştirak edib.
                </h5>
                <p>
                  Azərbaycan Respublikasının Prezidenti İlham Əliyev dekabrın
                  28-də Əmək və Əhalinin Sosial Müdafiəsi Nazirliyinin
                  tabeliyində olan Dayanıqlı və Operativ Sosial Təminat
                  Agentliyinin Bakının Xətai rayonunda yerləşən 5 saylı DOST
                  Mərkəzinin açılışında iştirak edib.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="photo-gallery">
      <div class="container">
        <h3>Naxçıvan fotolarda</h3>
      </div>
      <div class="container">
        <!-- Slider main container -->
        <div class="swiper-container">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <div class="swiper-slide container-gallery">
              <div class="row display-1">
              <img src="{{asset('front/')}}/img/Rectangle 435.png" alt="" />
              </div>
            </div>
            <div class="swiper-slide container-gallery">
              <div class="row display-1">
              <img src="{{asset('front/')}}/img/Rectangle 441.png" alt="" />
              </div>
            </div>
            <div class="swiper-slide container-gallery">
              <div class="row display-1">
              <img src="{{asset('front/')}}/img/Rectangle 436.png" alt="" />
              </div>
            </div>
            <div class="swiper-slide container-gallery">
              <div class="row display-1">
              <img src="{{asset('front/')}}/img/Rectangle 437.png" alt="" />
              </div>
            </div>
            <div class="swiper-slide container-gallery">
              <div class="row display-1">
              <img src="{{asset('front/')}}/img/Rectangle 438.png" alt="" />
              </div>
            </div>
            <div class="swiper-slide container-gallery">
              <div class="row display-1">
              <img src="{{asset('front/')}}/img/Rectangle 439.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--  -->

@endsection