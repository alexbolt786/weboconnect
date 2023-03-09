function setMsg(elem, value) {
	value.length === 0 ? elem.removeClass('bg-danger') : elem.addClass('bg-danger');
	elem.get(0).setCustomValidity(value);
	return value.length === 0;
}
function checkName(id) {
	let e = $('#'+ id);
	if (e.val().length === 0) return setMsg(e, 'Name is required');
	else if (e.val().length > 20) return setMsg(e, 'Max 20 chars allowed');
	else return setMsg(e, '');
}
function checkEmail() {
	let e = $('#email');
	let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
	if (e.val().length === 0) return setMsg(e, 'Email address is required');
	else if (!regex.test(e.val())) return setMsg(e, 'Please enter valid email');
	else if (e.val().length > 50) return setMsg(e, 'Max 50 chars allowed');
	else return setMsg(e, '');
}
function checkPassword() {
	let e = $('#password');
	if (e.val().length === 0) return setMsg(e, 'Password is required');
	else if (e.val().length < 8) return setMsg(e, 'Password must be atleast 8 chars');
	else if (e.val().length > 50) return setMsg(e, 'Max 50 chars allowed');
	else return setMsg(e, '');
}
function register(e) {
	let sanity = checkEmail() && checkPassword() && checkName('firstName') && checkName('lastName');
	if (!sanity) return false;
	e.preventDefault();
	data = {};
	$('.form input').each(function(i,elem){
		data[elem.name] = elem.value;
	});
	$('form')[0].reset();
	$('#spinner').removeClass('d-none');
	$('.form input').prop('disabled', true);
	$('#button').prop('disabled', true);
	$.ajaxSetup({headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	$.ajax({
		type: 'POST',
		url: 'register',
		timeout: 5000,
		contentType: 'application/json',
		data: JSON.stringify(data),
		processData: false
	}).done(function(data){
		$('form').remove();
		$('#alert').html('Registration successfull<br><br><button onclick="window.location.href=\'/login\';" class="btn btn-lg btn-primary">Login here</button>');
		$('#alert').removeClass('d-none').addClass('alert-success');
	}).fail(function(xhr){
		errObj = { 'server': 'Something went wrong.' };
		try { errObj = xhr.responseJSON.errors; } catch(err) {}
		errors = [];
		for (let x in errObj) errors.push(errObj[x]);
		$('#alert').html(errors.join('<br>'));
		$('#alert').removeClass('d-none').addClass('alert-danger');
	}).always(function(){
		$('#spinner').addClass('d-none');
		$('.form input').prop('disabled', false);
		$('#button').prop('disabled', false);
	});
}
function login(e) {
	let sanity = checkEmail() && checkPassword();
	if (!sanity) return false;
	e.preventDefault();
	data = {
		email: $('#email').val(),
		password: $('#password').val()
	};
	$('form')[0].reset();
	$('#spinner').removeClass('d-none');
	$('.form input').prop('disabled', true);
	$('#button').prop('disabled', true);
	$.ajaxSetup({headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	$.ajax({
		type: 'POST',
		url: 'login',
		timeout: 5000,
		contentType: 'application/json',
		data: JSON.stringify(data),
		processData: false
	}).done(function(data){
		if (data.success) {
			window.location.href = '/profile';
			return;
		}	
		$('#alert').html('Login FAILED.');
		$('#alert').removeClass('d-none').addClass('alert-danger');
	}).fail(function(xhr){
		errObj = { 'server': 'Something went wrong.' };
		try { errObj = xhr.responseJSON.errors; } catch(err) {}
		errors = [];
		for (let x in errObj) errors.push(errObj[x]);
		$('#alert').html(errors.join('<br>'));
		$('#alert').removeClass('d-none').addClass('alert-danger');
	}).always(function(){
		$('#spinner').addClass('d-none');
		$('.form input').prop('disabled', false);
		$('#button').prop('disabled', false);
	});
}
function edit(e) {
	return (checkName('firstName') && checkName('lastName'));
}