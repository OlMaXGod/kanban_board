@section("modal_dialog_del_project")

<div class="modal fade" id="exampleModalDeleteProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Вы действительно хотите удалить проект?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-danger" id="deleteModalButtonProject" >Удалить</button>
        </div>
    </div>
    </div>
</div>

@endsection