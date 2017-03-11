var Api = function(){

	/**
	 * Token used to identify the user in OAuth2
	 *
	 * @var {string}
	 */
	this.token = null;

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


	return $.ajax(call);
};
