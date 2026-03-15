@extends('admin.layouts.parent')

@section('title', " تعديل مشروع $project->name " )
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/service_project.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('services_projects.update_check', $project->id) }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">اسم المشروع</label>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control "
                        placeholder="اكتب المشروع" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="service_id">القسم</label>
                    <select name="service_id" id="service_id" class="form-control ">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}"
                                {{ $project->service_id == $service->id ? 'selected' : '' }}> {{ $service->name }} </option>
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
                    <input type="text" name="button" value="{{ $project->button }}" class="form-control "
                        placeholder="اكتب عنوان الزر" id="button">
                    @error('button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="image">تحميل صورة الخلفية للمشروع </label>
                    <input type="file" name="image" class="form-control" value="{{ $project->image }}"
                        placeholder="تحميل صورة" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل المشروع </button>
                </div>
            </div>
        </form>
    </div>
@endsection
