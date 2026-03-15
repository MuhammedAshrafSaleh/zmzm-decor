@extends('admin.layouts.parent')

@section('title', 'اضافة كلمة رئيس القسم')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/about.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('about.create_check') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row mb-3 pl-2">
                    <div class="col-6">
                        <label for="description">الوصف</label>
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control "
                            placeholder="اكتب الوصف" id="description">
                        @error('description')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="image">تحميل  صورة رقم 1</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                            placeholder="تحميل صورة" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل </button>
                </div>
            </div>
        </form>
    </div>
@endsection
