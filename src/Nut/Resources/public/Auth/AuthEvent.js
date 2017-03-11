$('#form-login').on('submit', function(e) {
	e.preventDefault();

	var params = {
		username: $(this).find("[name='username']").val(),
		password: $(this).find("[name='password']").val()
	};

	console.log(params);

	var au = new AuthManager();
	au.login(params);


});