@extends('admin.layouts.parent')
@section('title', 'الاعمال الحالية')


@section('content')
    <div class="col-12">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>صورة المشروع</th>
                    <th>اسم المشروع</th>
                    <th>مدة المشروع</th>
                    <th>عرض في الوجه الرئيسية</th>
                    <th>الموقع</th>
                    <th>اخر تحديث</th>
                    <th>اسم الصورة</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($currentWorks as $work)
                    <tr>
                        <td>{{ $work->id }}</td>
                        <td class="w-25">
                            <img src="{{ url('imgs/current_works/' . $work->image) }}" class="img-fluid img-thumbnail"
                                alt="">
                        </td>
                        <td>{{ $work->name }}</td>
                        <td>{{ $work->time }}</td>
                        <td>{{ $work->status ? 'معروض' : 'غير معروض' }}</td>
                        <td>{{ $work->location }}</td>
                        <td>{{ $work->last_updated }}</td>
                        <td>{{ $work->image }}</td>
                        <td>
                            <a href="{{ route('current-works.update', $work->id) }}" class="btn btn-primary">تعديل</a>
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
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('current-works.create') }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
    </div>

  @include('admin.includes.remove_model', ['message' => "هل تريد المسح ؟", 'route' => route('current-works.delete', $work->id)  ]);
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
