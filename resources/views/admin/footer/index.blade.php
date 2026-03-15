@extends('admin.layouts.parent')
@section('title', 'قوائم الانتقالات ')


@section('content')
    <div class="col-12">
        @include('admin.includes.message')
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/footer_social.png') }}" class="img-fluid">
        </div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>الصورة</th>
                    <th>اسم وسيلة التواصل</th>
                    <th> لينك وسيلة التواصل</th>
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التحديث</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($footerSocial as $footerItem)
                    <tr>
                        <td>{{ $footerItem->id }}</td>
                        <td class="w-25">
                            <img src="{{ url('imgs/footer/' . $footerItem->image) }}" class="img-fluid img-thumbnail"
                                alt="zmzm-project">
                        </td>
                        <td>
                            {{ $footerItem->name }}
                        </td>
                        <td>
                            {{ $footerItem->url }}
                        </td>
                        <td>
                            <?php
                            $date = date_create($footerItem->created_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <?php
                            $date = date_create($footerItem->updated_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <a href="{{ route('footer.update_social', $footerItem->id) }}"
                                class="btn btn-primary mb-2">تعديل</a>
                            <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeFooterItemModel"> مسح </button>
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد اي خدمة بعد' }}
                @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('footer.create_social') }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/footer_contacts.png') }}" class="img-fluid">
        </div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>الصورة</th>
                    <th>اسم وسيلة التواصل</th>
                    <th> لينك وسيلة التواصل</th>
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التحديث</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($footerContacts as $footerItem)
                    <tr>
                        <td>{{ $footerItem->id }}</td>
                        <td class="w-25">
                            <img src="{{ url('imgs/footer/' . $footerItem->image) }}" class="img-fluid img-thumbnail"
                                alt="zmzm-project">
                        </td>
                        <td>
                            {{ $footerItem->contact }}
                        </td>
                        <td>
                            {{ $footerItem->url }}
                        </td>
                        <td>
                            <?php
                            $date = date_create($footerItem->created_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <?php
                            $date = date_create($footerItem->updated_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <a href="{{ route('footer.update_contacts', $footerItem->id) }}"
                                class="btn btn-primary mb-2">تعديل</a>
                                <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeFooterItemModel">
                                    مسح </button>
                        </td>
                    </tr>
                @empty
                    {{ 'لا يوجد اي خدمة بعد' }}
                @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('footer.create_contacts') }}"> اضافة عنصر
                    جديد </a>
                    
            </div>
        </div>
        <div class="col-12 my-3 text-center">
            <img src="{{ url('imgs/admin/nav.png') }}" class="img-fluid">
        </div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>اسم الانتقال</th>
                    <th> لينك الانتقال</th>
                    <th>ترتيب الانتقال</th>
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التحديث</th>
                    <th>أعمال أخري</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($navlist as $footerItem)
                    <tr>
                        <td>{{ $footerItem->id }}</td>
                        <td>
                            {{ $footerItem->name }}
                        </td>
                        <td>
                            {{ $footerItem->url }}
                        </td>
                        <td>
                            {{ $footerItem->nav_order }}
                        </td>
                        <td>
                            <?php
                            $date = date_create($footerItem->created_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <?php
                            $date = date_create($footerItem->updated_at);
                            echo date_format($date, 'd-m-Y');
                            ?>
                        </td>
                        <td>
                            <a href="{{ route('footer.update_navbar', $footerItem->id) }}"
                                class="btn btn-primary mb-2">تعديل</a>
                            <button class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#removeImageModel">
                                مسح </button>
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
                <a class="btn btn-success d-block w-100 my-3 py-3" href="{{ route('footer.create_navbar') }}"> اضافة عنصر
                    جديد </a>
            </div>
        </div>
    </div>
    @include('admin.includes.remove_model', [
        'message' => 'هل تريد المسح ؟',
        'route' => route('footer.delete_nav', $footerItem->id),
    ]);
        @include('admin.includes.remove_model', [
            'message' => 'هل تريد المسح ؟',
            'route' => route('footer.delete_social', $footerItem->id),
            'id' => 'removeFooterItemModel',
        ]);
            @include('admin.includes.remove_model', [
                'message' => 'هل تريد المسح ؟',
                'route' => route('footer.delete_social', $footerItem->id),
                'id' => 'removeFooterItemModel',
            ]);
@endsection

@section('js')
    <script src="{{ url('dist/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>

@endsection
