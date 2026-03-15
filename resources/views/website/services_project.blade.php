@extends('website.layouts.parent')
@section('title', 'خدمات زمزم للديكور')



@section('css')
<!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css'>-->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css'>
@endsection



@section('content')
    <section class="service__project">
        <div class="service__project__head wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.5s">
            <h2 class="main__heading "> {{$project_name->name}} <span></span></h2>
            <p class="head__text"> أحدث الاعمال والتشطيبات والمشروعات التي تتم في الوقت الحالي </p>
        </div>
        <div class="service__project__container">
            <div class="service__project__body">
                @foreach ($images as $image)
                <a href="{{url('imgs/services_images/' . $image->image)}}" data-toggle="lightbox" data-gallery="gallery" class="service__project__link">
                    <img src="{{url('imgs/services_images/' . $image->image)}}" class="img-fluid rounded" style="transform:scale(1);">
                </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection



@section('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js'></script>
    <script id="rendered-js">
        $(document).on("click", '[data-toggle="lightbox"]', function (event) {
          event.preventDefault();
          $(this).ekkoLightbox();
        });
      </script>
@endsection
