@extends('admin.layouts.parent')
@php
    $name = '';
    foreach ($projects as $key => $project) {
        foreach ($services as $service) {
            if ($project->service_id == $service->id) {
                $name = $service->name;
                break;
            }
        }
    }
@endphp
@section('title', "كل المشروعات لخدمة $name")



@section('content')
    <div class="col-12">
        @include('admin.includes.message')
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
                                <form action="{{ route('services_projects.delete', $project->id) }}" method="POST" class="d-inline">
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
    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="removeImageModel" tabindex="-1" role="dialog" aria-labelledby="removeImageModelLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeImageModelLabel" style="font-family: Cairo">مسح الصورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل بالفعل تريد المسح ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <form action=" {{ route('services_projects.delete', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"> مسح </button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
