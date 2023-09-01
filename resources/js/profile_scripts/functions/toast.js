export default function showToast(text){
	$('#successToastText').html(text);

	$('#successToast').toast("show");
}