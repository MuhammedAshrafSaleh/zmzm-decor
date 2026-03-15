@extends('admin.layouts.parent')

@section('title', "تعديل مشروع $project->name")
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/projects.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('projects.update_check', $project->id) }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">اسم المشروع </label>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control "
                        placeholder="اكتب اسم المشروع" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="description">الوصف</label>
                    <input type="text" name="description" value="{{ $project->description }}" class="form-control "
                        placeholder="اكتب الوصف" id="description">
                    @error('description')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="youtube_url">لينك المشروع علي اليوتيوب</label>
                    <input type="text" name="youtube_url" value="{{ $project->youtube_url }}" class="form-control "
                        placeholder="اكتب لينك المشروع" id="youtube_url">
                    @error('youtube_url')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="area">المساحة</label>
                    <input type="text" name="area" value="{{ $project->area }}" class="form-control "
                        placeholder="اكتب المساحة" id="area">
                    @error('area')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="work_order">ترتيب المشروع من 1 الي 4</label>
                    <input type="number" name="work_order" value="{{ $project->work_order }}" class="form-control "
                        placeholder="اكتب الترتيب" id="work_order">
                    @error('work_order')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="button">عنوان الزر</label>
                    <input type="text" name="button" value="{{ $project->button }}" class="form-control "
                        placeholder="اكتب عنوان الزر" id="button">
                    @error('button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="status">عرض المشروع في الصفحة الرئيسة</label>
                    <select name="status" id="status" class="form-control ">
                        <option value="1"   {{ $project->status == 1 ? "selected" : "" }} > معروض </option>
                        <option value="0"   {{ $project->status == 0 ? "selected" : "" }} >غير معروض</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="category_id">القسم</label>
                    <select name="category_id" id="category_id" class="form-control ">
                        @foreach ($categories as $category)
                            <option {{ $project->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->name }} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index">تعديل المشروع  </button>
                </div>
            </div>
        </form>
    </div>
@endsection
