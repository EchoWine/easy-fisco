var Api = function(){

	/**
	 * Token used to identify the user in OAuth2
	 *
	 * @var {string}
	 */
	this.token = null;

	/**
	 * Client ID
	 *
	 * @var {string
	 */
	this.client_id = null;

	/**
	 * Client Secret
	 *
	 * @var {string}
	 */
	this.client_secret = null;

	/**
	 * Api URL
	 *
	 * @var {string}}
	 */
	this.url = null;
};

/**
 * Set the token
 *
 * @param {string} token
 *
 * @return this;
 */
Api.prototype.setToken = function(token)
{
	this.token = token;

	return this;
};

/**
 * Get the token
 *
 * @return this;
 */
Api.prototype.getToken = function()
{
	return this.token;
};


/**
 * Set the client id
 *
 * @param {string} client_id
 *
 * @return this
 */
Api.prototype.setClientId = function(client_id)
{
	this.client_id = client_id;

	return this;
};

/**
 * Get client id
 *
 * @return {string}
 */
Api.prototype.getClientId = function()
{
	return this.client_id;
}

/**
 * Set the client secret
 *
 * @param {string} client_secret
 *
 * @return this
 */
Api.prototype.setClientSecret = function(client_secret)
{
	this.client_secret = client_secret;

	return this;
};

/**
 * Get client id
 *
 * @return {string}
 */
Api.prototype.getClientSecret = function()
{
	return this.client_secret;
}

/**
 * Set the url
 *
 * @param {string} url
 *
 * @return this;
 */
Api.prototype.setUrl = function(url)
{
	this.url = url;

	return this;
};

/**
 * Get the url
 *
 * @return this;
 */
Api.prototype.getUrl = function()
{
	return this.url;
};

/**
 * Persist the token
 *
 * @param token
 *
 * @return void
 */
Api.prototype.persistToken = function(token)
{	
	this.setToken(token);
	this.updateTokenToStorage(token);
};

/**
 * Persist the token
 *
 * @param token
 *
 * @return void
 */
Api.prototype.updateTokenToStorage = function(token)
{	
	App.getClient().getCookies().set('token', token);
};

/**
 * Persist the token
 *
 * @return string
 */
Api.prototype.updateTokenFromStorage = function()
{	
	this.setToken(App.getClient().getCookies().get('token'));
};

/**
 * Make a call to api
 *
 * @param {string} method
 * @param {string} url
 * @param {object} params
 * @param {closure} callback
 *
 * @return void
 */
Api.prototype.call = function(method, url, params, callback){

	var headers = {};

	if(this.getToken() != null){
		headers['Authorization'] = 'Bearer '+this.getToken();
	}



	var call = {
		type: method,
		url: this.getUrl()+url, 
		data : params,
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		success: function(response) {
			callback(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {

			console.log('Error during call: '+url);

			if(jqXHR && jqXHR.responseJSON){
				console.log(jqXHR.responseJSON);

				callback(jqXHR.responseJSON);
			}
		},
		dataType:'json',
		headers: headers
	};


	console.log(call);
	
	return $.ajax(call);
};
