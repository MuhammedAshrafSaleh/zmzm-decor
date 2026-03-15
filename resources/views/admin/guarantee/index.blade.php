@extends('admin.layouts.parent')
@section('title', 'ضمان زمزم للديكور')

@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-6 my-3 text-center mx-auto mb-5">
            <img src="{{ url('imgs/admin/guarantee.png') }}" class="img-fluid">
            <a href="{{ route('guarantee.update_link', $guarantee->id) }}" class="btn py-3 btn-primary d-block mt-5">تعديل
                لينك اليوتيوب</a>
        </div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>الصورة</th>
                    <th>الوصف</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guarantees as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="">
                            <img src="{{ url('imgs/guarantee/' . $item->image) }}" class="img-fluid img-thumbnail"
                                alt="" style="width: 10rem;">
                        </td>
                        <td>{{ $item->text }}</td>
                        <td>
                            <a href="{{ route('guarantee.update', $item->id) }}" class="btn btn-primary">تعديل</a>
                            {{-- <form action=" {{ route('guarantee.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"> مسح </button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد كلمات للدكتور رامي' }}
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="removeImageModel" tabindex="-1" role="dialog" aria-labelledby="removeImageModelLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeModelLabel" style="font-family: Cairo">تعديل لينك الفيديو</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    @include('admin.includes.message')
                    <form action="{{ route('guarantee.update_link_check', $guarantee->id) }}" class="form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-6 my-3 mb-5">
                            <img src="{{ url('imgs/admin/guarantee.png') }}" class="img-fluid mb-5" alt="zmzm guarantee">
                            <div class="form-row mb-3 pl-2">
                                <div class="col">
                                    <label for="url">لينك اليوتيوب</label>
                                    <input type="url" name="url" value="{{ $guarantee->url }}" class="form-control "
                                        placeholder="اكتب اللينك" id="url">
                                    @error('url')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            <button class="btn btn-lg btn-success py-3 w-100" name="page" value="index"> تعديل اللينك
                            </button>
                        </div>
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
