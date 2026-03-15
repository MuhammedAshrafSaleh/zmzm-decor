@extends('admin.layouts.parent')

@section('title', 'اضافة مشروع جاري')

@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/current_wroks.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('current-works.create_check') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">اسم المشروع</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        placeholder="اسم المشروع" id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="time">مدة المشروع</label>
                    <input type="text" name="time" value="{{  old('time') }}" class="form-control "
                        placeholder="اكتب مدة المشروع" id="time">
                    @error('time')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="location"> الموقع </label>
                    <input type="text" name="location" value="{{   old('location') }}" class="form-control"
                        placeholder="الموقع" id="location">
                    @error('location')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="last_updated">اخر تحديث</label>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary" style="color: #FFF !important" id="dateButton"> أحصل علي تاريخ اليوم </a>
                        <input type="text" name="last_updated" id="dateDisplay" value="{{  old('last_updated') }}"
                            class="form-control mr-2" placeholder="اكتب تاريخ اليوم" id="last_updated">
                    </div>
                    @error('last_updated')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="image">تحميل صورة</label>
                    <input type="file" name="image" class="form-control" value="{{  old('image') }}"
                        placeholder="Upload Image" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="status"> عرض في الصفحة الرئيسية </label>
                    <select name="status" id="status" class="form-control ">
                        <option value="1" > معروض </option>
                        <option value="0" >غير معروض</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> اضافة مشروع جاري </button>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('js')
    <script>
        let dateButton = document.getElementById('dateButton');
        let dateDisplay = document.getElementById('dateDisplay');
        // Add click event listener to the button
        dateButton.addEventListener('click', function() {
            // Get the current date
            let currentDate = new Date();
            let month = currentDate.getMonth() + 1; // Months are zero-based, so we add 1
            let day = currentDate.getDate();
            let year = currentDate.getFullYear();

            // Format the date in short format
            let formattedDate = day + '-' + month + '-' + year;

            // Update the content of the div with the formatted date
            dateDisplay.value = formattedDate;
        });
    </script>
@endsection