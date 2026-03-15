@extends('admin.layouts.parent')
@section('title', 'كلمة رئيس مجلس الادارة')


@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-6 my-3 text-center mx-auto mb-5">
            <img src="{{ url('imgs/about/' . $about_image->image) }}" class="img-fluid">
            <a href="{{ route('about.update_image', $about_image->id) }}" class="btn py-3 btn-primary d-block">تعديل
                الصورة</a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>الوصف</th>
                    <th>الصورة</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contents as $content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->description }}</td>
                        <td>{{ $content->image }}</td>
                        <td>
                            <a href="{{ route('about.update_content', $content->id) }}" class="btn btn-primary">تعديل</a>
                            <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeImageModel"> مسح </button>
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد كلمات للدكتور رامي' }}
                @endforelse
            </tbody>
        </table>
    </div>
@include('admin.includes.remove_model', ['message' => "هل تريد المسح ؟", 'route' => route('about.delete', $content->id)]);
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
