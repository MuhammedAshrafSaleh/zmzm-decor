@section('css')
    <style>
        .guarantee {
            width: 100%;
            padding: 5rem 0;
        }

        .guarantee__content {
            width: 30%;
        }

        .guarantee__body {
            display: flex;
            width: 100%;
            justify-content: space-evenly;
            align-items: center;
        }

        .guarantee__youtube {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .guarantee__youtube img {
            max-width: 100%;
        }

        iframe {
            width: 640rem;
            height: 36rem;
        }

        @media (max-width: 900px) {
            .guarantee__body {
                flex-direction: column;
            }

            .guarantee__content {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .guarantee__youtube {
                width: 100%;
            }
        }

        .services__head {
            margin-bottom: 5rem !important;
        }
    </style>
@endsection

<section class="guarantee" id="guarantee">
    <div class="container">
        <div class="services__head wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
            <h2 class="main__heading">
                {{ $guaranteeHeading->head }}
                <span> {{ $guaranteeHeading->head_span }} </span>
            </h2>
            <p class="head__text">
                {{ $guaranteeHeading->sub_head }}
            </p>
        </div>
        <div class="guarantee__body">
            <div class="guarantee__content">
                <ul class="about_list">
                    @foreach ($guarantees as $item)
                        <li class="about__item wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <p class="main__text" style="font-size: 2.5rem; color: var(--primary);font-weight:900;">
                                {{ $item->text }}</p>
                            <img src="{{ url('imgs/guarantee/' . $item->image) }}" style="max-height: 8rem"
                                alt="check image" class="about__icon">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="guarantee__youtube"  onclick="playVideo('{{ $guarantee->url }}')" style="cursor:pointer">
                <img src="{{ url('imgs/guarantee/' . $guarantee->image) }}" alt="YouTube Thumbnail"
                    style=" max-width: 100%;">
            </div>
        </div>
    </div>
</section>
