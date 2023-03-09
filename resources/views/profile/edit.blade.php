<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Edit Profile</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
		<link rel="stylesheet" href="css/form.css" />
		<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
		<script src="js/form.js"></script>
	</head>
	<body class="text-center">
		<main class="form">
			<div class="alert d-none" id="alert" role="alert"></div>
			<div class="spinner-border text-primary d-none" id="spinner" role="status"></div>
			<form action="" method="post" enctype="multipart/form-data">
				@csrf
				<h1 class="h2 mb-3 fw-normal">Edit Profile</h1>
				<div class="form-group form-floating mb-3">
					<input type="text" class="form-control" value="{{ $user->email }}" disabled>
					<label for="email">Email address</label>
				</div>
				<div class="form-group mb-3">
					<input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png,.bmp,.gif" />
				</div>
				<div class="form-group form-floating mb-3">
					<input type="text" class="form-control" id="firstName" value="{{ $user->firstName }}" name="firstName" placeholder="First Name" required="required" onblur="checkName(this.id)">
					<label for="firstName">First Name</label>
				</div>
				<div class="form-group form-floating mb-3">
					<input type="text" class="form-control" id="lastName" value="{{ $user->lastName }}" name="lastName" placeholder="Last Name" required="required" onblur="checkName(this.id)">
					<label for="lastName">Last Name</label>
				</div>
				<button id="button" class="w-100 btn btn-lg btn-primary" type="submit" onclick="edit(event)">Submit</button>
			</form>
		</main>
	</body>
</html>