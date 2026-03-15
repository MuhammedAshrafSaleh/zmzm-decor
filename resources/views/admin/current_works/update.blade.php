@extends('admin.layouts.parent')

@section('title', 'تعديل الأعمال الحالية')

@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/current_wroks.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('current-works.update_check', $currentWork->id) }}" class="form" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="name">اسم المشروع</label>
                    <input type="text" name="name" value="{{ $currentWork->name }}" class="form-control"
                        placeholder="Name " id="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="time">مدة المشروع</label>
                    <input type="text" name="time" value="{{ $currentWork->time }}" class="form-control "
                        placeholder="Name " id="time">
                    @error('time')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="location"> الموقع </label>
                    <input type="text" name="location" value="{{ $currentWork->location }}" class="form-control"
                        placeholder="Name " id="location">
                    @error('location')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="last_updated">اخر تحديث</label>
                    <div class="d-flex">
                        <button class="btn btn-lg btn-primary" id="dateButton"> أحصل علي تاريخ اليوم </button>
                        <input type="text" name="last_updated" id="dateDisplay" value="{{ $currentWork->last_updated }}"
                            class="form-control mr-2" placeholder="Name " id="last_updated">
                    </div>
                    @error('last_updated')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="image">تحميل صورة</label>
                    <input type="file" name="image" class="form-control" value="{{ $currentWork->image }}"
                        placeholder="Upload Image" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="status"> عرض في الصفحة الرئيسية </label>
                    <select name="status" id="status" class="form-control ">
                        <option value="1"   {{ $currentWork->status == 1 ? "selected" : ""}} > معروض </option>
                        <option value="0"   {{ $currentWork->status == 0 ? "selected" : ""}} >غير معروض</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <img src="{{ url('imgs/current_works/' . $currentWork->image) }}" class="img-fluid"
                        alt="{{ $currentWork->name }}">
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
