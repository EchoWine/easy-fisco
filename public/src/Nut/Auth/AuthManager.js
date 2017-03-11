var AuthManager = function() {


};

AuthManager.prototype.login = function(params) {

	if(!params.username || !params.password)
		return;

	params.client_id = App.getApi().getClientId();
	params.client_secret = App.getApi().getClientSecret();
	params.scope = '';
	params.grant_type = 'password';

	App.getApi().call('POST', '/oauth/token', params, function(response) {

		if(response.access_token) {
			App.getApi().persistToken(response.access_token);
		}
	});

};