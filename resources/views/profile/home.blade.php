<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>Home</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
		<link rel="stylesheet" href="css/form.css" />
	</head>
	<body class="text-center">
		<main class="form" style="margin-top: 50px;">
			<h1>Home</h1><hr>
			<div class="alert d-none" id="alert" role="alert"></div>
			<div class="spinner-border text-primary d-none" id="spinner" role="status"></div>
			<button id="button" class="btn btn-lg btn-success" onclick="window.location.href='/people';">People</button>&nbsp;&nbsp;&nbsp;&nbsp;
			<button id="button" class="btn btn-lg btn-primary" onclick="window.location.href='/logout';">Logout</button><br><br>
			<div class="visible-print text-center">
@php($url = 'https://www.bawana.in/profile-edit?act='.$act)
			{!! QrCode::size(200)->generate($url); !!}
			</div>
		</main>
	</body>
</html>