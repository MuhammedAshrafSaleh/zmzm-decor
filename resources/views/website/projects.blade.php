@extends('website.layouts.parent')

@section('title', 'أعمال زمزم للديكور')
@section('css')

    <style>
        .works__head {
            margin: 10rem 0;
            margin-top: 15rem;
        }
    </style>
@endsection

@section('content')

    <section class="works" id="works">
        <div class="container">
            <div class="works__head wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
                <h2 class="main__heading">
                    {{ $category_name->name }}
                    {{-- <span> {{ $worksHeading->head_span }} </span> --}}
                </h2>
                <p class="head__text">
                    {{-- {{ $worksHeading->sub_head }} --}}
                    أفضل تصميم بأفضل جودة في أفضل وقت
                </p>
            </div>
            <div class="works__body">
                @foreach ($projects as $index => $project)
                    <div class="{{ $index % 2 == 0 ? 'works__row' : 'works__row--reverse' }}">
                        <div class="works__content wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <h3 class="main__heading"> {{ $project->name }}
                            </h3>
                            <p class="secondary__text"> {{ $project->description }} </p>
                            <p class="secondary__head">{{ $project->area }}m<sup>2</sup></p>
                            <a href="{{ route('project_details', $project->id) }}" class="btn"> <span>&rarr;</span>
                                {{ $project->button }}</a>
                        </div>
                        <div class="works__image wow bounceInRight" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <div class="gallery-container">
                                <div class="gallery-wrap">
                                    @foreach ($images as $imageIndex => $image)
                                        @if ($image->work_id == $project->id)
                                            <div class="item item-{{ $imageIndex + 1 }}"
                                                style="background-image: url('{{ url('imgs/works_images/' . $image->image) }}');">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
