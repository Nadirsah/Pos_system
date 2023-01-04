<footer>
<p>
        Copyright © {{date('Y')}}. Naxçıvan Muxtar Respublikası Rabitə və Yeni
        Texnologiyalar Nazirliyi
      </p>
    </footer>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('front/')}}/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".swiper-container", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        preventClicks: false,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        preventClicksPropagation: false,
        coverflowEffect: {
          rotate: 20,
          stretch: 0,
          depth: 350,
          modifier: 1,
          slideShadows: true,
        },
      });

      var swiper = new Swiper(".website-slide", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        autoplay: {
          delay: 1000,
          disableOnInteraction: false,
        },
        loop: true,
        slidesPerView: 3,
        breakpoints: {
          300: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          1200: {
            slidesPerView: 4,
          },
        },
      });
      var swiper = new Swiper(".gallery-swipe", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        autoplay: {
          delay: 1000,
          disableOnInteraction: false,
        },
        loop: true,
        slidesPerView: 3,
        breakpoints: {
          300: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          1200: {
            slidesPerView: 3,
          },
        },
      });
      var swiper = new Swiper(".news-slider", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        autoplay: {
          delay: 1000,
          disableOnInteraction: false,
        },
        loop: true,
        slidesPerView: 3,
        breakpoints: {
          300: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          1200: {
            slidesPerView: 3,
          },
        },
      });
      var swiper = new Swiper(".karabakh-slider", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        autoplay: {
          delay: 1000,
          disableOnInteraction: false,
        },
        loop: true,
        slidesPerView: 4,
        breakpoints: {
          300: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          1200: {
            slidesPerView: 4,
          },
        },
      });
    </script>
  </body>
</html>
