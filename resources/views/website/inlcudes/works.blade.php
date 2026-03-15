<section class="works" id="works">
    <div class="container">
        <div class="works__head wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
            <h2 class="main__heading">
                {{ $worksHeading->head }}
                <span> {{ $worksHeading->head_span }} </span>
            </h2>
            <p class="head__text">
                {{ $worksHeading->sub_head }}
            </p>
        </div>
        <div class="works__body">
            @foreach ($projects as $index => $project)
                <div class="{{ $index % 2 == 0 ? 'works__row' : 'works__row--reverse' }}">
                    <div class="works__content wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <h3 class="main__heading"> {{ $project->name }}
                            {{-- <span> {{ $project->name_span }} </span> --}}
                        </h3>
                        <p class="secondary__text"> {{ $project->description }} </p>
                        <p class="secondary__head">{{ $project->area }}m<sup>2</sup></p>
                        <a href="{{route('project_details', $project->id)}}" class="btn"> <span>&rarr;</span>
                            {{ $project->button }}</a>
                    </div>
                    <div class="works__image wow bounceInRight" data-wow-duration="1.5s" data-wow-delay="0.5s" style="overflow:hidden">
                        <div class="gallery-container">
                            <section class="home hero-slider hero-style" id="home" >
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($project_images as $img_index => $image)
                                        @if ($project->id == $image->work_id)
                                                <div class="swiper-slide" style="width: 100%;">
                                                    <div class="slide-inner slide-bg-image"
                                                        data-background="{{ url('imgs/works_images/' . $image->image) }}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </section>
                            {{-- <div class="gallery-wrap"> --}}
                                @foreach ($project_images as $img_index => $image)
                                    @if ($project->id == $image->work_id)
                                        <div class="item item-{{ $img_index + 1 }}"
                                            style="background-image: url('{{ url('imgs/works_images/' . $image->image) }}');">
                                        </div>
                                    @endif
                                @endforeach
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="works__footer">
            <a href="{{route('categories')}}" class="btn btn-bg wow bounce" data-wow-duration="1.5s"
                data-wow-delay="0.5s"> رؤية مشاريع زمزم للديكور للديكور</a>
        </div>
    </div>
</section>
