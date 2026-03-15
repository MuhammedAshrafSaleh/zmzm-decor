@extends('admin.layouts.parent')
@section('css')
    <style>
        h5{
            font-family: "Cairo";
        }
        .card {
            border-radius: 1rem;
           padding: 2rem 5rem;
        }
        .flex_container {
            width: 100%;
            padding-top: 5rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
    </style>
@endsection
@section('title', 'Zmzm Dashboard')

@section('content')
<div class="flex_container">
    <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">مشاريع زمزم للديكور</h5>
          <a href="{{ route('projects.index') }}" class="btn btn-primary">الذهاب الى المشاريع</a>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">خدمات زمزم للديكور</h5>
          <a href="{{ route('services.index') }}" class="btn btn-primary">الذهاب الى الخدمات</a>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">الأعمال الحالية</h5>
          <a href="{{ route('current-works.index') }}" class="btn btn-primary">الذهاب الى الأعمال الحالية</a>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">واجهات زمزم للديكور</h5>
          <a href="{{ route('home.index') }}" class="btn btn-primary">الذهاب الى الواجهات</a>
        </div>
    </div>
</div>
@endsection
