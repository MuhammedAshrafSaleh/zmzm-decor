<div class="modal fade" id="addImageModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family:Cairo" id="exampleModalLongTitle">اضافة الصورة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="add_image_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-dark">
                    <div class="row my-2">
                        <div class="col">
                            <label for="work_id">اسم المشروع</label>
                            <select name="work_id" id="work_id" class="form-control ">
                                @foreach ($works as $work)
                                    <option value="{{ $work->id }}"> {{ $work->name }} </option>
                                @endforeach
                            </select>
                            @error('work_id')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <label for="image_category_id">القسم</label>
                            <select name="image_category_id" id="image_category_id" class="form-control ">
                                @foreach ($images_categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('image_category_id')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <label for="show_in_front">عرض الصورة في الصفحة الرئيسة</label>
                            <select name="show_in_front" id="show_in_front" class="form-control ">
                                <option value="1"> معروض</option>
                                <option value="0">غير معروض</option>
                            </select>
                            @error('show_in_front')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <label for="image">تحميل  صورة  </label>
                            <input type="file" name="image[]" class="form-control" multiple placeholder="تحميل صورة" id="image">
                            @error('image')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" id="add_btn" class="btn btn-success">اضافة الصورة</button>
                </div>
            </form>
        </div>
    </div>
</div>
