<section class="current__works" id="current_works">
    <div class="container">
        <div class="current__works__head">
            <h2 class="main__heading">
                {{ $currentHeading->head }}
                <span> {{ $currentHeading->head_span }} </span>

            </h2>
            <p class="head__text">
                {{ $currentHeading->sub_head }}
            </p>
        </div>
        <div class="current__works__body">
            @foreach ($currentWorks as $cur_work)
                <div class="current__works__box wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
                    <div class="current__works__image">
                        <img src="{{ url('imgs/current_works/' . $cur_work->image) }}" alt="zmzm-projects">
                        <div class="current__works__tag tag">
                            {{ $cur_work->name }}
                        </div>
                    </div>
                    <div class="current__works__content" style="padding: 0; padding-top: 5rem;">
                        <div class="current__works__row">
                            <h3 class="secondary__head">
                                مدة المشروع
                            </h3>
                            <p class="secondary__text">
                                {{ $cur_work->time }}
                            </p>
                        </div>
                        <div class="current__works__row">
                            <h3 class="secondary__head">
                                الموقع
                            </h3>
                            <p class="secondary__text">
                                {{ $cur_work->location }}
                            </p>
                        </div>
                        <div class="current__works__row">
                            <h3 class="secondary__head">
                                أخر تحديث
                            </h3>
                            <p class="secondary__text">
                                {{ $cur_work->last_updated }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="works__footer">
            <a href="{{route('all_current_works')}}" class="btn btn-bg wow bounce" data-wow-duration="1.5s"
                data-wow-delay="0.5s"> رؤية كل المشاريع الحالية </a>
        </div>
    </div>
</section>