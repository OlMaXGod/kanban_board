<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{!! asset('css/app.css') !!}" rel="stylesheet">
	<script src="{!! asset('js/app.js') !!}" ></script>
	<title>Profile</title>
</head>
<body>
	@foreach($data as $key => $value)
		{{$key}} -- {{$value}} 
	@endforeach
	<button type="button" class="btn btn-primary">Primary</button>
</body>
</html>