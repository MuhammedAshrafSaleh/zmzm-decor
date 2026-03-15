@extends('admin.layouts.parent')
@section('title', 'خدمات زمزم للديكور')


@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/services.png') }}" class="img-fluid">
        </div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>الصورة</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>عنوان الزر</th>
                    <th>عرض مشاريع الخدمة</th>
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التحديث</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td class="w-25">
                            <img src="{{ url('imgs/services/' . $service->image) }}" class="img-fluid img-thumbnail"
                                alt="zmzm-project">
                        </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->button }}</td>
                        <td>
                            {{-- <a href="{{ route('services-projects.index', $service->id) }}" class="btn btn-success mb-2">عرض مشاريع الخدمة </a> --}}
                            <a href="{{ route('services.service_projects', $service->id) }}" class="btn btn-success mb-2">عرض مشاريع الخدمة</a>
                        </td>
                        <td>
                            <?php
                            $date = date_create($service->created_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <?php
                            $date = date_create($service->updated_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <a href="{{ route('services.update', $service->id) }}" class="btn btn-primary mb-2">تعديل</a>
                            <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeServiceModel"> مسح </button>
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد اي خدمة بعد' }}
                @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('services.create') }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="removeServiceModel" tabindex="-1" role="dialog" aria-labelledby="removeServiceModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="removeServiceModelLabel" style="font-family: Cairo">مسح الصورة</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         هل بالفعل تريد المسح ؟
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <form action=" {{ route('services.delete', $service->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger"> مسح </button>
        </form>
        </div>
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
