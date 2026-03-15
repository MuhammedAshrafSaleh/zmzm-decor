
<div class="modal fade" id="removeImageModel" tabindex="-1" role="dialog" aria-labelledby="removeImageModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModelLabel" style="font-family: Cairo">مسح الصورة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
              هل تريد المسح بالتأكيد ؟
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <form action="{{ $route }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"> مسح </button>
                </form>
            </div>
        </div>
    </div>
</div>
