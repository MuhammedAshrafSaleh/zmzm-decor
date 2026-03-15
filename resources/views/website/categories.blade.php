@extends('website.layouts.parent')

@section('title','أقسام زمزم للديكور')

@section('content')
<section class="current__works " id="main_categories">
    <div class="container">
      <div class="current__works__head wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.5s">
        <h2 class="main__heading "> أعمال  <span>  زمزم للديكور  </span></h2>
        <p class="head__text"> أحدث الاعمال والتشطيبات والمشروعات التي تتم في الوقت الحالي </p>
      </div>
      <div class="current__works__body">
        @foreach ($categories as $category)
        <div class="current__works__box wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.5s">
            <div class="current__works__image">
              <img src="{{url('imgs/categories/' . $category->image)}}" alt="zmzm-projects">
            </div>
            <div class="current__works__content">
              <div class="current__works__row">
                <h3 class="secondary__head">
                 {{ $category->name }}
                </h3>
                <p class="secondary__text">
                    {{ $category->description }}
                </p>
              </div>
            </div>
            <div class="current__works__footer">
              <a href="{{route('projects', $category->id )}}" class="btn"> <span>&rarr;</span>{{ $category->button }}  </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection