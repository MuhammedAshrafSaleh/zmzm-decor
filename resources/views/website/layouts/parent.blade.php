<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" نساعد العملاء للوصول إلى أفضل جودة من خلال تصميمات (3D) حديثة ومعاصرة قبل التنفيذ ✨ 
صمم ونفذ واستلم وانت فى بيتك  🧡">
    @yield('css')
    
    <link rel="shortcut icon" href="{{ url('imgs/favicon.ico') }}" />
    
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '8524461100994967');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=8524461100994967&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
    <!-- IF BROWSER DOESN'T SUPPORT JAVASCRIPT THEN USE NORMAL LINK TAGS TO LOAD CSS -->
        <noscript>
              <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css"/>
              <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"/>
        </noscript>
        
        <!-- LOAD CSS -->
        <script type="text/javascript">//<![CDATA[
        function lazycss(url) {
          var css = document.createElement("link");
            css.href = url;
            css.rel = "stylesheet";
            css.type = "text/css";
            document.getElementsByTagName("head")[0].appendChild(css);
        }
        // LOAD CSS
        lazycss("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css");
        lazycss("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css");
        //]]></script> 
    <link rel="stylesheet" href="{{ url('css/animate.css') }}" />
    <link rel="stylesheet" href=" {{ url('css/app.css') }}">
    
    <!-- TODO: -->
    <title>@yield('title')</title>
    <style>
          @media (max-width: 56.25rem) {
           .swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet {
                    margin: 0px 10px;
            }
            .nav__text {
                font-size: 2rem;
            }
            .nav {
            padding: 2rem 2rem;
            }
            .hero-slider .swiper-pagination-bullet {
                wiidth: 40px;
                height: 10px;
                text-align: left;
                line-height: 12px;
                font-size: 12px;
                color: #000;
                BORDER-RADIUS: 10PX;
                opacity: .3;
                background: #fff;
                transition: .2s;
            }
        }
    </style>
 
    <script>
        window.console = window.console || function(t) {};
    </script>
</head>

<body>

    <!--==========================================================================-
           Whatsapp Button
    --==========================================================================-->

    <div class="whatsapp">
        <a href="https://wa.me/{{ $whatsapp->phone }}" target="_blank" class="whatsapp__link">
            <img src="{{ url('imgs/' . $whatsapp->image) }}" alt="whatsapp">
        </a>
    </div>
    <div class="cursor"></div>


    <!--==========================================================================-
           Nav Section
    --==========================================================================-->
    @include('website.inlcudes.nav')


    <!--==========================================================================-
        content Section
    --==========================================================================-->
    <!-- TODO: -->
    @yield('content')

    <!--==========================================================================-
                                  Footer Section
    --==========================================================================-->
    @include('website.inlcudes.footer')

    @yield('pre-js')
    <script src="{{ url('js/stopExecutionOnTimeout.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js' ></script>
    <script src="{{ url('dist/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('js/wow.min.js') }}" ></script>
    <script src="{{ url('js/app.js') }}"></script>
        
    <script>
        // // For Swipper 
        //   window.addEventListener('load', function() {
        //     var swiperCss = document.createElement('link');
        //     swiperCss.rel = 'stylesheet';
        //     swiperCss.href = 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css';
        //     document.head.appendChild(swiperCss);
        //   });
        // // For Font-Awsome
        //   window.addEventListener('load', function() {
        //     var fontAwesomeCss = document.createElement('link');
        //     fontAwesomeCss.rel = 'stylesheet';
        //     fontAwesomeCss.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css';
        //     document.head.appendChild(fontAwesomeCss);
        //   });
    </script>
    <!-- TODO: -->
    
    <script>
         new WOW().init();
    </script>
        <script>
        function playVideo(videoId) {
            // Create the iframe with the YouTube video embedded
            var iframe = document.createElement('iframe');
            iframe.width = '560'; // Adjust dimensions as needed
            iframe.height = '315';
            iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1'; // Autoplay the video
            iframe.allow = 'autoplay'; // Allow autoplay

            // Replace the thumbnail with the video iframe
            var thumbnailContainer = document.querySelector('.guarantee__youtube');
            thumbnailContainer.innerHTML = ''; // Clear the container
            thumbnailContainer.appendChild(iframe);
        }
    </script>
    @yield('js')

</body>

</html>
