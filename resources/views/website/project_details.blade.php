@extends('website.layouts.parent')

@section('title', 'مشروعات زمزم للديكور')
@section('css')

    <style>
        .swiper-cube-shadow {
            display: none !important;
        }

        @media (max-width: 56.25rem) {
            .item:hover {
                flex: 15 !important;
            }

            .gallery-container {
                width: 100% !important;
            }
        }
    </style>
@endsection
@section('content')
    <!--==========================================================================-
                                                                                       Youtube Section
                                    --==========================================================================-->
    <section class="youtube" id="youtube">
        <div class="heading">
            <h2 class="main__heading">{{ $project_details->name }}</h2>
        </div>
        @if ($project_details->youtube_url != null)
            <div class="container">
                <div class="youtube__container">
                     <iframe src="{{ $project_details->youtube_url }}" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe> 
                </div>
            </div>
        @endif
    </section>

    @php
        $images_sections = [];
        $takenImages = [];
        foreach ($images_category as $index => $category) {
            $images_sections[$category->name] = 0;
            foreach ($images as $image) {
                if ($category->id == $image->image_category_id) {
                    $images_sections[$category->name]++;
                }
            }
        }
    @endphp
    @foreach ($images_category as $category)
        @if ($images_sections[$category->name] != 0)
            <div class="work__container">
                <div class="heading">
                    <h2 class="main__heading">{{ $category->name }}</h2>
                </div>
                <div class="gallery-container" style="width:90%">
                    @if ($images_sections[$category->name] > 4)
                        @for ($i = 0; $i < ceil($images_sections[$category->name] / 4); $i++)
                            @php
                                $cnt = 0;
                            @endphp

                            <div class="gallery-wrap " style="height: 90vh; margin-bottom: 2rem">
                                @foreach ($images as $img)
                                    @if ($img->image_category_id == $category->id && !in_array($img->image, $takenImages) && $cnt < 4)
                                        <div class="item"
                                            style="background-image: url(' {{ url('imgs/works_images/' . $img->image) }} ');">
                                        </div>
                                        @php
                                            array_push($takenImages, $img->image);
                                            $cnt += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        @endfor
                    @else
                        <div class="gallery-wrap">
                            @foreach ($images as $img)
                                @if ($img->image_category_id == $category->id)
                                    <div class="item"
                                        style="background-image: url(' {{ url('imgs/works_images/' . $img->image) }} ');">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endif

    @endforeach
    @include('website.inlcudes.telephone');
@endsection
