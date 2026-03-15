@extends('website.layouts.parent')
@section('title', 'خدمات زمزم للديكور')
@section('css')
<style>
    .sub_services__head {
      margin-top: 20rem;
    }
    .services_link {
        font-size: 1.5rem
    }
</style>
@endsection
@section('content')
    <section class="sub_services " id="main_categories">
        <div class="container">
          <div class="sub_services__head wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.5s">
            <h2 class="main__heading "> {{ $service_name->name }}  <span></span></h2>
            <p class="head__text"> أحدث الاعمال والتشطيبات والمشروعات التي تتم في الوقت الحالي </p>
          </div>
          <div class="sub_services__body">
            @foreach ($projects as $project)
            <div class="sub_services__box" style="background-image: url('{{url('imgs/services_projects/' . $project->image)}}');">
                <div class="sub_services__content">
                <h3 class="sub_services__subhead">
                  {{ $project->name }}
                </h3>
                <a href="{{ route('services_project', $project->id) }}" class="btn services_link"> <span>&rarr;</span>  {{ $project->button }} </a>
              </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
@endsection
