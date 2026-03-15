@extends('admin.layouts.parent')
@section('title', 'العنوانين الرئيسية')


@section('content')
    <div class="col-12 my-3 text-center">
        <img src="{{ url('imgs/admin/head.png') }}" class="img-fluid">
    </div>

    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>اسم الاول للقسم</th>
                <th> الاسم الثاني للقسم </th>
                <th> النبذة التعرفية بالقسم </th>
                <th> اسم القسم </th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التحديث</th>
                <th>أعمال أخري</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($headings as $head)
                <tr>
                    <td>{{ $head->id }}</td>
                    <td>
                        {{ $head->head }}
                    </td>
                    <td>
                        {{ $head->head_span }}
                    </td>
                    <td>
                        {{ $head->sub_head }}
                    </td>
                    <td>
                        {{ $head->category_name }}
                    </td>
                    <td>
                        <?php
                        $date = date_create($head->created_at);
                        echo date_format($date, 'd-m-Y');
                        ?>
                    </td>
                    <td>
                        <?php
                        $date = date_create($head->updated_at);
                        echo date_format($date, 'd-m-Y');
                        ?>
                    </td>
                    <td>
                        <a href="{{ route('headings.update', $head->id) }}" class="btn btn-primary mb-2">تعديل</a>
                        <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeImageModel"> مسح
                        </button>
                    </td>
                </tr>
            @empty
                {{ 'لا يوجد اي خدمة بعد' }}
            @endforelse
        </tbody>
    </table>
    @include('admin.includes.remove_model', [
        'message' => 'هل تريد المسح ؟',
        'route' => route('headings.delete', $head->id),
    ]);
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
