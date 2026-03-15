@extends('admin.layouts.parent')

@section('title', 'اضافة مشروع جديد')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/service_project.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('services_projects.create_check') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row mb-3 pl-2">
                    <div class="col-6">
                        <label for="name">اسم المشروع</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control "
                            placeholder="اكتب المساحة" id="name">
                        @error('name')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="service_id">القسم</label>
                        <select name="service_id" id="service_id" class="form-control ">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"> {{ $service->name }} </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                 </div>
                <div class="form-row mb-3 pl-2">
                    <div class="col-6">
                        <label for="button">عنوان الزر</label>
                        <input type="text" name="button" value="{{ old('button') }}" class="form-control "
                            placeholder="اكتب المساحة" id="button">
                        @error('button')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="image">تحميل  صورة  </label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                            placeholder="تحميل صورة" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> اضافة مشروع </button>
                </div>
            </div>
        </form>
    </div>
@endsection
