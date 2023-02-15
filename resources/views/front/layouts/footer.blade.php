 <!-- Start Footer -->
 <footer class="bg-dark" id="tempaltemo_footer">
     <div class="container">
         <div class="row">

             <div class="col-md-4 pt-5">
                 <h2 class="h2 text-success  pb-3 border-light logo">{{$header->name}}</h2>
                
             </div>

             <div class="col-md-4 pt-5">
                 <h2 class="h2 text-light border-bottom pb-3 border-light">Bölmələr</h2>
                 <ul class="list-unstyled text-light footer-link-list">

                     @foreach($page as $pages)
                     <li class="nav-item"><a class="nav-link"
                             href="{{route('pages',$pages->slug)}}">{{$pages->name}}</a></li>
                     @endforeach
                 </ul>
             </div>

             <div class="col-md-4 pt-5">
                 <h2 class="h2 text-light border-bottom pb-3 border-light">İnfo</h2>
                 <ul class="list-unstyled text-light footer-link-list">
                     <li><a class="text-decoration-none" href="#">Əsas səhifə</a></li>
                     <li><a class="text-decoration-none" href="#">Haqqımızda</a></li>
                     <li><a class="text-decoration-none" href="#">Çatdırılma</a></li>
                     <li><a class="text-decoration-none" href="#">Əlaqə</a></li>
                 </ul>
             </div>

         </div>

         <div class="row text-light mb-4">
             <div class="col-12 mb-3">
                 <div class="w-100 my-3 border-top border-light"></div>
             </div>
             <div class="col-auto me-auto">
                 @php $sosials=['facebook','instagram'];
                 @endphp
                 @foreach($sosials as $sosial)
                 @if($header->$sosial!=null)
                 <a class="text-white" target="_blank" href="{{$header->$sosial}}" class="mx-2">
                     <i class="fa-brands fa-{{$sosial}} fa-lg fa-fw me-2"></i></a>
                 @endif
                 @endforeach
             </div>
             
         </div>
     </div>

     <div class="w-100 bg-black py-3">
         <div class="container">
             <div class="row pt-2">
                 <div class="col-12">
                     <p class="text-left text-light">
                         Copyright &copy; {{date('Y')}} Designed
                         | I&N 
                     </p>
                 </div>
             </div>
         </div>
     </div>

 </footer>
 <!-- End Footer -->

 <!-- Start Script -->
 <script src="{{asset('front/')}}/assets/js/jquery-1.11.0.min.js"></script>
 <script src="{{asset('front/')}}/assets/js/jquery-migrate-1.2.1.min.js"></script>
 <script src="{{asset('front/')}}/assets/js/bootstrap.bundle.min.js"></script>
 <script src="{{asset('front/')}}/assets/js/templatemo.js"></script>
 <script src="{{asset('front/')}}/assets/js/custom.js"></script>
 <script src="{{asset('front/')}}/assets/swiper/swiper-bundle.min.js"></script>
 <!-- End Script -->

 <!-- Start Slider Script -->
 <script src="{{asset('front/')}}/assets/js/slick.min.js"></script>
 <script>
$('#carousel-related-product').slick({
    infinite: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 3,
    dots: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        }
    ]
});
 </script>
 <!-- End Slider Script -->
 </body>

 </html>