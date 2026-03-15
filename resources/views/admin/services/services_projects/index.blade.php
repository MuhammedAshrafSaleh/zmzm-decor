@extends('admin.layouts.parent')

@php
$name = '';
foreach ($projects as $project) {
foreach ($services as $service) {
if ($project->service_id == $service->id) {
$name = $service->name;
break;
}
};
}
@endphp
@section('title', "كل المشروعات لخدمة $name")


@section('content')
<div class="col-12">
    @include('admin.includes.message')
    <div class="col-12 my-3 text-center">
        <img src="{{ url('imgs/admin/service_project.png') }}" class="img-fluid">
    </div>

    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>الصورة</th>
                <th>اسم المشروع</th>
                <th>القسم</th>
                <th>عنوان الزر</th>
                <th>صور المشروع</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التحديث</th>
                <th>أعمال أخري</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td class="w-25">
                    <img src="{{ url('imgs/services_projects/' . $project->image) }}" class="img-fluid img-thumbnail"
                        alt="zmzm-project">
                </td>
                <td>{{ $project->name }}</td>
                <td>
                    @foreach ($services as $service)
                    @if ($project->service_id == $service->id)
                    {{ $service->name }}
                    @endif
                    @endforeach
                </td>
                <td>{{ $project->button }}</td>
                <td>
                    <a href="{{ route('services_images.service_images', $project->id) }}"
                        class="btn btn-success mb-2">عرض صور المشروع</a>
                </td>
                <td>
                    <?php
                    $date = date_create($project->created_at);
                    echo date_format($date, 'd-m-Y');
                    ?>
                </td>
                <td>
                    <?php
                    $date = date_create($project->updated_at);
                    echo date_format($date, 'd-m-Y');
                    ?>
                </td>
                <td>
                    <a href="{{ route('services_projects.update', $project->id) }}"
                        class="btn btn-primary mb-2">تعديل</a>
                    <form action=" {{ route('services_projects.delete', $project->id) }}" method="POST">
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
            <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('services_projects.create') }}"> اضافة
                عنصر
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