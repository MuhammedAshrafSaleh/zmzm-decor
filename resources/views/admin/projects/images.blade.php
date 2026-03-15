@extends('admin.layouts.parent')
@section('title', $project->name)
@section('css')
    <style>
        .table-image td,
        th {
            vertical-align: middle;
        }
    </style>
@endsection
@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        @include('admin.projects.image-crud.edit_image')
        @include('admin.projects.image-crud.add_image')
        <div class="row">
            {{-- {{ route('projects.create_specific_image_project', $project->id) }} --}}
            <div class="col">
                <button type="button" class="btn btn-success d-block w-100 my-3 py-3" data-toggle="modal" data-target="#addImageModel">
                        اضافة صور للمشروع
                </button>
            </div>
        </div>
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
                            <img src="{{ url('imgs/works_images/' . $image->image) }}" class="img-fluid img-thumbnail"
                                alt="">
                        </td>
                        <td>
                            {{ $project->name }}
                        </td>
                        {{-- <td>
                            {{ $image->image_order }}
                        </td> --}}
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
                            <button type="button" class="btn btn-primary editIcon mb-2" data-toggle="modal" id = {{ $image->id }}
                                data-target="#editImageModel">
                                تعديل
                            </button>
                            <form action="{{ route('projects.delete_image', $image->id) }}" method="POST" class="d-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger deleteIcon d-block" id="{{ $image->id }}"> مسح </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد اي خدمة بعد' }}
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })

            // edit question ajax request
            $(document).on("click", ".editIcon", function(e) {
                e.preventDefault();
                let id = $(this).attr("id");
                $.ajax({
                    url: '{{ route('projects.edit_image') }}',
                    method: "get",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                           // Best Practise
                        $("#show_in_front").val(response.show_in_front);
                        $("#image_category_id").val(response.image_category_id);
                        $("#work_id").val(response.work_id);
                        $("#image_id").val(response.id);
                    },
                });
            });


           // update question ajax request
            $("#edit_image_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_btn").text("...يتم التعديل الان");
                $.ajax({
                    url: '{{ route('projects.update_image') }}',
                    method: "post",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            console.log("Good");
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "تمت التعديل بفضل الله",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                        $("#editImageModel").modal("hide");
                        $("#edit_btn").text("تعديل السؤال");
                        $("#edit_image_form")[0].reset();
                        location.reload();
                    },
                });
            });
        });
            // delete employee ajax request
    $(document).on("click", ".deleteIcon", function (e) {
        e.preventDefault();
        let id = $(this).attr("id");
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
            title: "هل متأكد من أنك تريد المسح",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "نعم إمسحه",
            cancelButtonText: "إغلاق",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{route('projects.delete_image')}}',
                    method: "delete",
                    data: {
                        id: id,
                        _token: csrf,
                    },
                    success: function (response) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "تم المسح بفضل الله",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        location.reload();
                    },
                });
            }
        });
    });

    // add new employee ajax request
    $("#add_image_form").submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $("#add_btn").text("...تتم الاضافة الان");
        $.ajax({
            url: '{{ route('projects.create_image') }}',
            method: "post",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "تمت الاضافة بفضل الله",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
                $("#add_btn").text("اضافة صورة");
                $("#add_image_form")[0].reset();
                $("#addImageModel").modal("hide");
                location.reload();
            },
        });
    });
    </script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
