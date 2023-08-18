<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../../resources/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
	<title>Profile</title>
</head>
<body>
	@foreach($data as $key => $value)
		{{$key}} -- {{$value}} 
	@endforeach
	<button type="button" class="btn btn-primary">Primary</button>
</body>
</html>