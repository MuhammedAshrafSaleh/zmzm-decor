@extends('admin.layouts.parent')

@section('title', 'تعديل وسائل اتصال زمزم للديكور')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/footer_contacts.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('footer.update_contacts_check', $footerContact->id) }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="contact">اسم الوسيلة</label>
                    <input type="text" name="contact" value="{{ $footerContact->contact }}" class="form-control"
                        placeholder="اكتب العنوان" id="contact">
                    @error('contact')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="url"> لينك </label>
                    <input type="text" name="url" value="{{ $footerContact->url }}" class="form-control"
                        placeholder="اكتب عنوان الزر رقم " id="url">
                    @error('url')
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
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل اللوجو </button>
                </div>
            </div>
        </form>
    </div>
@endsection
