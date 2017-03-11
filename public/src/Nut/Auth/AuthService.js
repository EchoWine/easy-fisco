var AuthService = function(){

	/**
	 * Name service
	 *
	 * @var {string}
	 */
	this.name = 'auth';

	/**
	 * Current user
	 *
	 * @var {User}
	 */
	this.user = null;
};


/**
 * Set user
 */
AuthService.prototype.setUser = function(user)
{
	this.user = user;

	return this;	
};

/**
 * Get User
 */
AuthService.prototype.getUser = function()
{
	return this.user;	
};