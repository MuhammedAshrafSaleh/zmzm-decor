@extends('admin.layouts.parent')
@section('title', 'تعديل لينك اليوتيوب')

@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <form action="{{ route('guarantee.update_link_check', $guarantee->id) }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-6 my-3 mb-5">
                <img src="{{ url('imgs/admin/guarantee.png') }}"  class="img-fluid mb-5" alt="zmzm guarantee">
                <div class="form-row mb-3 pl-2">
                    <div class="col">
                        <label for="url">لينك اليوتيوب</label>
                        <input type="text" name="url" value="{{ $guarantee->url }}" class="form-control "
                            placeholder="اكتب اللينك" id="url">
                        @error('url')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col mb-5">
                    <label for="image">تحميل صورة </label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                        placeholder="تحميل صورة" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-lg btn-success py-3 w-100" name="page" value="index"> تعديل اللينك </button>
            </div>
        </form>
    </div>
@endsection
