<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>People</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body class="p-3 m-0 border-0 bd-example">
	<div class="center d-flex flex-row">
@if(count($users) == 0)
	<h1>No users right now.</h1>
@endif
@foreach ($users as $user)
		<div class="card p-2" style="width: 16rem; margin-right: 1rem;">
@if (file_exists(public_path().'/images/'.hash('sha256', $user->email)))
@php($photo = '/images/'.hash('sha256', $user->email))
@else
@php($photo = '/images/avatar.png')
@endif
			<img src="{{ $photo }}" alt="{{ $user->firstName }} {{ $user->lastName }}" class="bd-placeholder-img card-img-top" width="100%">
			<div class="card-body">
				<h5 class="card-title">{{ $user->firstName }} {{ $user->lastName }}</h5>
				<p class="card-text">{{ $user->firstName }} {{ $user->lastName }} contact @ {{ $user->email }}.</p>
			</div>
		</div>
@endforeach
	</div>
</body>
</html>
