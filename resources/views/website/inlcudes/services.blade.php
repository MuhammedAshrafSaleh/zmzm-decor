
    <section class="services" id="services">
        <div class="services__head wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
            <h2 class="main__heading">
                {{ $servicesHeading->head }}
                <span> {{ $servicesHeading->head_span }} </span>
            </h2>
            <p class="head__text">
                {{ $servicesHeading->sub_head }}
            </p>
        </div>
        @foreach ($services as $index => $service)
            <section class="services__bg {{ $index % 2 == 1 ? 'left' : ' ' }} "
                style="background-image:url('{{ url('imgs/services/' . $service->image) }}');">
                <div class="services__content" style="background-color: rgba(0,0,0,0.7);">
                    <h3 class="secondary__head">{{ $service->name }}</h3>
                    <p class="secondary__text"> {{ $service->description }} </p>
                    <a href="{{route('services', $service->id)}}" class="btn" style="font-size: 1.5rem"> <span>&rarr;</span> {{ $service->button }}</a>
                </div>
            </section>
        @endforeach
    </section>
