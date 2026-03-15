@extends('admin.layouts.parent')

@section('title', 'اضافة مشروع')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/projects.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('projects.create_check') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">اسم المشروع </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control "
                        placeholder="اكتب اسم المشروع" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="description">الوصف</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="form-control "
                        placeholder="اكتب الوصف" id="description">
                    @error('description')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="youtube_url">لينك المشروع علي اليوتيوب</label>
                    <input type="text" name="youtube_url" value="{{ old('youtube_url') }}" class="form-control "
                        placeholder="اكتب لينك المشروع" id="youtube_url">
                    @error('youtube_url')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="area">المساحة</label>
                    <input type="text" name="area" value="{{ old('area') }}" class="form-control "
                        placeholder="اكتب المساحة" id="area">
                    @error('area')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="work_order">ترتيب المشروع من 1 الي 4</label>
                    <input type="number" name="work_order" value="{{ old('work_order') }}" class="form-control "
                        placeholder="اكتب الترتيب" id="work_order">
                    @error('work_order')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="button">عنوان الزر</label>
                    <input type="text" name="button" value="{{ old('button') }}" class="form-control "
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
                        <option value="0">غير معروض</option>
                        <option value="1"> معروض </option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="category_id">القسم</label>
                    <select name="category_id" id="category_id" class="form-control ">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> انشاء مشروع </button>
                </div>
            </div>
        </form>
    </div>
@endsection
