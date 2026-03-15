@extends('admin.layouts.parent')

@section('title', 'اضافة عنصر جديد  ')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/nav.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('footer.create_navbar_check') }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">اسم الوسيلة</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        placeholder="اكتب العنوان" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="url"> لينك </label>
                    <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                        placeholder="اكتب اللينك" id="url">
                    @error('url')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-12">
                    <label for="nav_order"> الترتيب </label>
                    <input type="number" name="nav_order" value="{{ old('nav_order') }}" class="form-control"
                        placeholder="اكتب رقم الزر" id="nav_order">
                    @error('nav_order')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> اضافة </button>
                </div>
            </div>
        </form>
    </div>
@endsection
