@section("subtask_information")
    @if(!empty($_GET['participant']))
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$participant->where('id', $_GET['participant'])->first()->subtask}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
                </div>
            </div>
        </div>
        <button type="button" id='subtaskInformationModal' class="btn btn-primary" style="visibility:hidden;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        @if(!empty($_GET['participant']))
            <script>
                $( "#subtaskInformationModal" ).click();
            </script>
        @endif
    @endif
@endsection