var AuthServiceProvider = function(){

	/**
	 * Name service provider
	 *
	 * @var {string}
	 */
	this.name = 'auth';
};


/**
 * Initialize the provider [TODO: IMPROVE]
 *
 * Execute and call the next in stack
 *
 * @param {this}
 * @param {callback} next
 *
 * @return void
 */
AuthServiceProvider.prototype.initialize = function(self, next)
{
	
	App.addService('auth', new AuthService);
	
	var au = new AuthManager();

	au.authenticate(
		function() {
			next();
		},
		function() {


			next();
		}
	);

		
};