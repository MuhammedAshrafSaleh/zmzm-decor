@extends('admin.layouts.parent')
@php
    $name = "";
    foreach ($projects as  $project) {
        // echo $project;
        if($image->service_project_id == $project->id) {
            $name = $project->name;
            break;
        }
    }
@endphp
@section('title', "تعديل صورة لمشروع $name")

@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/service_image.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('services_images.update_check', $image->id) }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-row mb-3 pl-2">
                    <div class="col-6">
                        <label for="service_project_id">اسم المشروع</label>
                        <select name="service_project_id" id="service_project_id" class="form-control">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" class="form-control" {{  ($image->service_project_id == $project->id) ? "selected"  : "" }}> {{ $project->name }} </option>
                            @endforeach
                        </select>
                        @error('service_project_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="image">تحميل  صورة  </label>
                        <input type="file" name="image" class="form-control" value="{{ $image->image  }}"
                            placeholder="تحميل صورة" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 my-3 mx-auto">
                        <img src="{{ url('imgs/services_images/' . $image->image  ) }}" class="img-fluid">
                    </div>
                </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل مشروع </button>
                </div>
            </div>
        </form>
    </div>
@endsection
