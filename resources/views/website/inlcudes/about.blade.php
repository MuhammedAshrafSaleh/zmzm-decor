<section class="about" id="about">
    <div class="container">
        <h2 class="main__heading wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
            {{ $aboutHeading->head }}
            <span> {{ $aboutHeading->head_span }} </span>
        </h2>
        <div class="about__body">
            <div class="about__content">
                <p class="about__text wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
                    {{ $aboutHeading->sub_head }}
                </p>
                <ul class="about_list">
                    @foreach ($about_list as $item)
                        <li class="about__item wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <p class="main__text">{{ $item->description }}</p>
                            <img src="{{ url('imgs/about/' . $item->image) }}" alt="check image" class="about__icon">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="about__image wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">

                <img src='{{ url('imgs/about/' . $about_image->image) }}' alt="dr-ramy" class="dr_ramy_image">
            </div>
        </div>
    </div>
</section>