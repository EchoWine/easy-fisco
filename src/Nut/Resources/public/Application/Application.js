var Application = function(){

	/**
	 * List of all providers that must be loaded before the displaying
	 * Why this? Cause before load the page
	 * all libraries must be initialized
	 *
	 * @var {ArrayObject}
	 */
	this.providers = [];

	/**
	 * Instance of api
	 *
	 * @var {Api}
	 */
	this.api = new Api();

	/**
	 * Instance client
	 *
	 * @var {Client}
	 */
	this.client = new Client();

	/**
	 * Get provider
	 *
	 * @param {string} name
	 *
	 * @return Provider
	 */
	this.get = function(name)
	{

		var provider;

		for(index in this.providers) {

			provider = this.providers[index];

			if(provider.name == name) {
				return provider.provider;
			}
		}

		return null;
	};

};

/**
 * Add a provider
 *
 * @param {string} name
 * @param {closure} provider
 *
 * @return void
 */
Application.prototype.addProvider = function(name, provider)
{
	this.providers.push({
		name: name,
		provider: provider
	});
};

/**
 * Add a providers
 *
 * @param {string} name
 * @param {closure} callback
 *
 * @return void
 */
Application.prototype.addProviders = function(providers)
{

	for(index in providers){
		provider = new providers[index];
		provider.name;

		this.addProvider(provider.name, provider);
	}

};


/**
 * Execute all providers
 *
 * @return void
 */
Application.prototype.executeProviders = function()
{
	this.executeProvider(0);
};



/**
 * Execute a provider
 *
 * @param {string} name
 * @param {string} next
 *
 * @return void
 */
Application.prototype.executeProvider = function(index)
{

	var self = this;

	if(this.providers[index] == undefined)
		return;

	var provider = this.providers[index].provider;

	// Send a callback to execute the next provider when the service has ended execution
	provider.initialize(provider, function(){
		self.executeProvider(index+1);
	});

};

/**
 * Get the api instance
 *
 * @return {Api}
 */
Application.prototype.getApi = function()
{
	return this.api;
};

/**
 * Get client
 *
 * @return {Client}
 */
Application.prototype.getClient = function()
{
	return this.client;
};

/**
 * Initialize the application
 *
 * @return void
 */
Application.prototype.init = function()
{
	this.executeProviders();
};

/**
 * Display the application
 *
 * @return void
 */
Application.prototype.display = function()
{

};