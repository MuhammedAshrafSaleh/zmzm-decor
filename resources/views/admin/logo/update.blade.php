@extends('admin.layouts.parent')

@section('title', 'تعديل لوجو زمزم للديكور')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/logo_zmzm.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('logo.update_check', $logo->id) }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">اسم الشركة</label>
                    <input type="text" name="name" value="{{ $logo->name }}" class="form-control"
                        placeholder="اكتب العنوان" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="button"> عنوان الزر رقم </label>
                    <input type="text" name="button" value="{{ $logo->button }}" class="form-control"
                        placeholder="اكتب عنوان الزر رقم " id="button">
                    @error('button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-12">
                    <label for="logo">تحميل صورة</label>
                    <input type="file" name="logo" class="form-control" value="{{ old('logo') }}"
                        placeholder="تحميل صورة" id="logo">
                    @error('logo')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل اللوجو </button>
                </div>
            </div>
        </form>
    </div>
@endsection
