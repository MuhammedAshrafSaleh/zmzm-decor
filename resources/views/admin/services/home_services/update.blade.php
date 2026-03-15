@extends('admin.layouts.parent')

@section('title', 'تعديل خدمات زمزم للديكور')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/services.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('services.update_check', $service->id) }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">العنوان</label>
                    <input type="text" name="name" value="{{ $service->name }}" class="form-control"
                        placeholder="اكتب العنوان" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="description">الوصف</label>
                    <input type="text" name="description" value="{{ $service->description }}" class="form-control "
                        placeholder="اكتب الوصف" id="description">
                    @error('description')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="button"> عنوان الزر رقم </label>
                    <input type="text" name="button" value="{{ $service->button }}" class="form-control"
                        placeholder="اكتب عنوان الزر رقم 1" id="button">
                    @error('button')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <img src="{{ url('imgs/services/' . $service->image) }}" class="img-fluid" alt="{{ $service->image }}">
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
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل الخدمة </button>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection
