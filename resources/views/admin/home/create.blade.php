@extends('admin.layouts.parent')

@section('title', 'تعديل الوجه الرئيسية')

@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/home.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('home.create_check') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="head">العنوان</label>
                    <input type="text" name="head" value="{{ old('head') }}" class="form-control"
                        placeholder="اكتب العنوان" id="head">
                    @error('head')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="sub_head">الوصف</label>
                    <input type="text" name="sub_head" value="{{ old('sub_head') }}" class="form-control "
                        placeholder="اكتب الوصف" id="sub_head">
                    @error('sub_head')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="button"> عنوان الزر رقم 1</label>
                    <input type="text" name="button" value="{{ old('button') }}" class="form-control"
                        placeholder="اكتب عنوان الزر رقم 1" id="button">
                    @error('button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="sub_button">عنوان الزر رقم 2</label>
                    <input type="text" name="sub_button" id="dateDisplay" value="{{ old('sub_button') }}"
                        class="form-control mr-2" placeholder="اكتب عنوان الزر رقم 2" id="sub_button">
                    @error('sub_button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-12">
                    <label for="image">تحميل صورة</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                        placeholder="تحميل صورة" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> انشاء واجهة جديدة </button>
                </div>
            </div>
        </form>
    </div>
@endsection