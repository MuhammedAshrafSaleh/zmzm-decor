@extends('admin.layouts.parent')
@section('title', 'مشروعات زمزم للديكور')
@section('css')
<style>
    .table-image  td, th {
    vertical-align: middle;
    }
</style>
@endsection
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>اسم الصورة</th>
                    <th>اسم المشروع</th>
                    <th> ظهور بالواجهة الامامية </th>
                    <th>القسم</th>
                    <th>وقت الانشاء</th>
                    <th>وقت التحديث</th>
                    <th> أعمال اخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($project_images as $index => $image)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="w-25">
                            <img src="{{ url('imgs/works_images/' . $image->image) }}" class="img-fluid img-thumbnail" alt="">
                        </td>
                        <td>
                        @foreach ($projects as $project)
                            @if ($image->work_id == $project->id)
                                {{ $project->name }}    
                            @endif
                        @endforeach
                        </td>
                        <td>{{ $image->show_in_front ? 'عرض' : 'لا تعرض' }}</td>
                        <td>
                            @foreach ($images_categories as $category)
                                @if ($image->image_category_id == $category->id)
                                    {{ $category->name }}    
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
                            <a href="{{ route('projects.update_image', $image->id) }}" class="btn btn-primary mb-2">تعديل</a>
                            <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeImageModel"> مسح </button>
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد اي خدمة بعد' }}
                @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('projects.create_image') }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
    </div>
    @include('admin.includes.remove_model', ['message' => "هل تريد المسح ؟", 'route' => route('projects.delete_image', $image->id) ]);
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
