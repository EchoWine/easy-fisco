var AuthManager = function() {


};

AuthManager.prototype.login = function(params)
{

	if(!params.username || !params.password)
		return;

	params.client_id = App.getApi().getClientId();
	params.client_secret = App.getApi().getClientSecret();
	params.scope = '';
	params.grant_type = 'password';

	App.getApi().call('POST', '/oauth/token', params, function(response) {

		if(response.access_token) {
			App.getApi().persistToken(response.access_token);
			App.redirectTo("/");
		}
	});

};

AuthManager.prototype.authenticate = function(success, error) 
{
	if(App.getApi().getToken()){
		App.getApi().call('GET', '/user/profile', {}, function(response) {

			if(response.status == 'success') {

				App.get('auth').setUser(response.data);

				if(success)
					success();

			}else{
					
				if(error)
					error();
			}

		});

	}else{

		if(error)
			error();
	}

}