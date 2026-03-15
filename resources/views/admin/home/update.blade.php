@extends('admin.layouts.parent')

@section('title', 'تعديل  الوجه الرئيسية')

@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/home.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('home.update_check', $slide->id) }}" class="form" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="head">العنوان</label>
                    <input type="text" name="head" value="{{ $slide->head }}" class="form-control"
                        placeholder="head" id="head">
                    @error('head')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="sub_head">الوصف</label>
                    <input type="text" name="sub_head" value="{{ $slide->sub_head }}" class="form-control "
                        placeholder="sub_head" id="sub_head">
                    @error('sub_head')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="button"> عنوان الزر رقم 1</label>
                    <input type="text" name="button" value="{{ $slide->button }}" class="form-control"
                        placeholder="Name " id="button">
                    @error('button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="sub_button">عنوان الزر رقم 2</label>
                        <input type="text" name="sub_button" id="dateDisplay" value="{{ $slide->sub_button }}"
                            class="form-control mr-2" placeholder="Name " id="sub_button">
                    @error('sub_button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="image">تحميل صورة</label>
                    <input type="file" name="image" class="form-control" value="{{ $slide->image }}"
                        placeholder="تحميل صورة" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <img src="{{ url('imgs/home/' . $slide->image) }}" class="img-fluid"
                        alt="{{ $slide->image }}">
                </div>

            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل </button>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection
