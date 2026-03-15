@extends('admin.layouts.parent')

@section('title', 'تعديل كلمات الضمان')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/guarantee.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('guarantee.update_check', $guarantee->id) }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="text">الوصف</label>
                    <input type="text" name="text" value="{{ $guarantee->text }}" class="form-control "
                        placeholder="اكتب الوصف" id="text">
                    @error('text')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-3">
                    <label for="image">تحميل صورة </label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                        placeholder="تحميل صورة" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-2">
                    <img src="{{ url('imgs/guarantee/' . $guarantee->image) }}" style="max-width:7rem" class="img-fluid"
                        alt="{{ $guarantee->image }}">
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
