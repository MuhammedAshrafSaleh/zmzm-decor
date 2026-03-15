@extends('admin.layouts.parent')
@section('title', 'مشروعات زمزم للديكور')


@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>اسم الشمروع</th>
                    <th>الوصف</th>
                    <th>مساحة المشروع</th>
                    <th>لينك اليوتيوب</th>
                    <th>عرض في المشروعات الخارجية</th>
                    <th>ترتيب المشروع من 1 ال 4</th>
                    <th>القسم</th>
                    <th>صور المشروع</th>
                    <th>وقت الانشاء</th>
                    <th>وقت التحديث</th>
                    <th> أعمال اخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $index => $project)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->area }}</td>
                        <td>{{ $project->youtube_url }}</td>
                        <td>{{ $project->status ? 'معروض' : 'غير معروض' }}</td>
                        <td>{{ $project->work_order }}</td>
                        <td>
                            @foreach ($categories as $category)
                                @if ($project->category_id == $category->id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                        <a href="{{ route('projects.images', $project->id) }}" class="btn btn-success mb-2">صور المشروع</a>
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
                            <a href="{{ route('projects.update', $project->id) }}" class="btn btn-primary mb-2">تعديل</a>
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
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('projects.create') }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
    </div>
    @include('admin.includes.remove_model', ['message' => "هل تريد المسح ؟", 'route' => route('projects.delete', $project->id) ]);
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
