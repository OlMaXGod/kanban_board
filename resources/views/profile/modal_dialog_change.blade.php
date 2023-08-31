@section("modal_dialog_change")

<div class="modal fade" id="exampleModalChange" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Обновление пароля</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
            <label for="firstEnterPass" class="form-label pt-1">Пароль</label>
            <input type="password" class="form-control border-3" id="firstEnterPass">
            <label for="secondEnterPass" class="form-label pt-1">Введите пароль ещё раз</label>
            <input type="password" class="form-control border-3" id="secondEnterPass">
            <div class="alert alert-danger mt-2 invisible" id="alertErrorPassword" role="alert">
                Пароли не совпадают, попробуйте еще раз
            </div>
            <div class="alert alert-warning mt-2 invisible" id="alertCountSymbolsPassword" role="alert">
                Длина пароля не может быть меньше 8 символов
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" id="savePasswordButton">Сохранить пароль</button>
        </div>
    </div>
    </div>
</div>

@endsection