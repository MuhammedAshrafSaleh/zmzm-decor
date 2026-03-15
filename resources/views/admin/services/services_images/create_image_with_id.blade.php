@extends('admin.layouts.parent')

@section('title', "إضافة صورة جديدة للمشروع " . ($project->name ?? '')))
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/service_image.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('services_images.create_check') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row mb-3 pl-2">
                    <div class="col-6">
                        <label for="service_project_id">اسم المشروع</label>
                        <select name="service_project_id" id="service_project_id" class="form-control ">
                            <option value="{{ $project->id }}"> {{ $project->name }} </option>
                        </select>
                        @error('service_project_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="image">تحميل  صورة  </label>
                        <input type="file" name="image[]" multiple class="form-control" value="{{ old('image') }}"
                            placeholder="تحميل صورة" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> اضافة صورة  </button>
                </div>
            </div>
        </form>
    </div>
@endsection
