@extends('admin.layouts.parent')

@section('title', 'تعديل كلمة رئيس القسم')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <form action="{{ route('about.update_image_check', $content->id) }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-6 my-3 mb-5">
                <img src="{{ url('imgs/about/' . $content->image) }}" class="img-fluid" alt="{{ $content->image }}">
                <div class="form-row mb-3 pl-2">
                    <div class="col">
                        <label for="image">تحميل صورة رقم 1</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                            placeholder="تحميل صورة" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-lg btn-success py-3 w-100" name="page" value="index"> تعديل الصورة </button>
            </div>
        </form>
    </div>
@endsection
