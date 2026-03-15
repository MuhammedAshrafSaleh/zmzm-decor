<section class="home hero-slider hero-style" id="home">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($home as $slide)
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ url('imgs/home/'. $slide->image) }}">
                    <div class="slider__container">
                        <div data-swiper-parallax="300" class="slide-title">
                            <h2> {{ $slide->head }} </h2>
                        </div>
                        <div data-swiper-parallax="400" class="slide-text">
                            <p class="main__text"> {{ $slide->sub_head }}  </p>
                        </div>
                        <div class="clearfix"></div>
                        <div data-swiper-parallax="500" class="slide-btns">
                            <a href="https://wa.me/{{$whatsapp->phone}}" class="theme-btn-s2">تواصل معانا</a>
                            <a href="{{route('categories')}}" class="theme-btn-s3">رؤية مشاريع زمزم للديكور</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
@section('js')
    <script>
        var menu = [];
        jQuery('.swiper-slide').each(function(index) {
            menu.push(jQuery(this).find('.slide-inner').attr("data-text"));
        });
        var interleaveOffset = 0.5;
        var swiperOptions = {
            loop: true,
            speed: 2000,
            parallax: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false
            },

            watchSlidesProgress: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },


            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },

            on: {
                progress: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        if (window.CP.shouldStopExecution(0)) break;
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-inner").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                    window.CP.exitedLoop(0);
                },

                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        if (window.CP.shouldStopExecution(1)) break;
                        swiper.slides[i].style.transition = "";
                    }
                    window.CP.exitedLoop(1);
                },

                setTransition: function(speed) {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        if (window.CP.shouldStopExecution(2)) break;
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-inner").style.transition =
                            speed + "ms";
                    }
                    window.CP.exitedLoop(2);
                }
            }
        };
        var swiper = new Swiper(".swiper-container", swiperOptions);
        // DATA BACKGROUND IMAGE
        var sliderBgSetting = $(".slide-bg-image");
        sliderBgSetting.each(function(indx) {
            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
    </script>
@endsection
