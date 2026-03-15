@extends('admin.layouts.parent')

@section('title', 'تعديل العنوان ')
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/head.png') }}" class="img-fluid">
        </div>
        <form action="{{ route('headings.update_check', $head->id) }}" class="form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="head">الاسم الاول للقسم</label>
                    <input type="text" name="head" value="{{ $head->head }}" class="form-control"
                        placeholder="اكتب اسم الاول القسم " id="head">
                    @error('head')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="head_span"> الاسم الثاني للقسم </label>
                    <input type="text" name="head_span" value="{{ $head->head_span }}" class="form-control"
                        placeholder="اكتب الاسم الثاني للقسم " id="head_span">
                    @error('head_span')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col-6">
                    <label for="category_name">اسم القسم</label>
                    <input type="text" name="category_name" value="{{ $head->category_name }}" class="form-control"
                        placeholder="اكتب اسم القسم" id="category_name">
                    @error('category_name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="sub_head"> النبذة التعريفية </label>
                    <input type="text" name="sub_head" value="{{ $head->sub_head }}" class="form-control"
                        placeholder="اكتب النبذة التعريفية"  id="sub_head">
                    @error('sub_head')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row mb-3 pl-2">
                <div class="col text-center">
                    <button class="btn btn-lg btn-success" name="page" value="index"> تعديل العنوان </button>
                </div>
            </div>
        </form>
    </div>
@endsection
