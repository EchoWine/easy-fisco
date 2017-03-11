$('.login-form').on('submit', function(e) {
	e.preventDefault();

	var params = {
		username: $(this).find("[name='username']").val(),
		password: $(this).find("[name='password']").val()
	};


	var au = new AuthManager();
	au.login(params);


});

$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});