@extends('admin.layouts.parent')
@php 
$name = "";
$project_id = 0;
foreach ($images as $image) {
    foreach ($projects as $project) {
        if($image->service_project_id  == $project->id)  {
            $name = $project->name;
            $project_id = $project->id;
            break;
        }
    }
}
@endphp
@section('title', "الصور الخدمية الخاصة بمشروع $name")


@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>الصورة</th>
                    <th>اسم المشروع</th>
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التحديث</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td class="w-25">
                            <img src="{{ url('imgs/services_images/' . $image->image) }}" class="img-fluid img-thumbnail"
                                alt="zmzm-project">
                        </td>
                        <td>
                            @foreach ($projects as $project)
                                @if($image->service_project_id  == $project->id) 
                                     {{ $project->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <?php
                            $date = date_create($image->created_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <?php
                            $date = date_create($image->updated_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <a href="{{ route('services_images.update', $image->id) }}" class="btn btn-primary mb-2">تعديل</a>
                            <form action=" {{ route('services_images.delete', $image->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"> مسح </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد اي خدمة بعد' }}
                @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('services_images.create_image_with_id',  $project_id ) }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
