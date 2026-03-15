@extends('admin.layouts.parent')

@section('title', "اضافة صورة جديدة لمشروع $project->name")
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/project_image.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('projects.create_image_check') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row mb-3 pl-2">
                    <div class="col-6">
                        <label for="work_id">اسم المشروع</label>
                        <select name="work_id" id="work_id" class="form-control">
                            <option value="{{ $project->id }}"> {{ $project->name }} </option>
                        </select>
                        @error('work_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="image_category_id">القسم</label>
                        <select name="image_category_id" id="image_category_id" class="form-control ">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                        @error('image_category_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-row mb-3 pl-2">
                    <div class="col-6">
                        <label for="show_in_front">عرض المشروع في الصفحة الرئيسة</label>
                        <select name="show_in_front" id="show_in_front" class="form-control ">
                            <option value="0">غير معروض</option>
                            <option value="1"> معروض </option>
                        </select>
                        @error('show_in_front')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="image">تحميل  صورة  </label>
                        <input type="file" name="image[]" class="form-control" multiple placeholder="تحميل صورة" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> اضافة صورة </button>
                </div>
            </div>
        </form>
    </div>
@endsection
