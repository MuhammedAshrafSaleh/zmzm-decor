@extends('admin.layouts.parent')
@section('title', 'الوجه الرئيسية')


@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>صورة الواجهة</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>عنوان الزر</th>
                    <th>عنوان الزر 2</th>
                    <th>الصورة</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($slides as  $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td class="w-25">
                            <img src="{{ url('imgs/home/' . $slide->image) }}" class="img-fluid img-thumbnail" alt="">
                        </td>
                        <td>{{ $slide->head }}</td>
                        <td>{{ $slide->sub_head }}</td>
                        <td>{{ $slide->button }}</td>
                        <td>{{ $slide->sub_button }}</td>
                        <td>{{ $slide->image }}</td>
                        <td>
                            <a href="{{ route('home.update', $slide->id) }}" class="btn btn-primary">تعديل</a>
                            <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeImageModel"> مسح </button>
                        </td>
                    </tr>
                @empty
                    {{ ' No Current Works Yet ' }}
                @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('home.create') }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
    </div>

    @include('admin.includes.remove_model', ['message' => "هل تريد المسح ؟", 'route' =>  route('home.delete', $slide->id) ]);
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
