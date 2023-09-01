@section("toast_success_change_data")

	<div class="toast-container position-fixed bottom-0 end-0 p-3">
		<div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header bg-success">
				<strong class="me-auto text-white">Успешно</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
			</div>
			<div class="toast-body" id="successToastText">
			Данные успешно изменены
			</div>
		</div>
	</div>

@endsection