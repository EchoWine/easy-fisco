var Client = function() {

	/**
	 * Cookies
	 *
	 * @var {Cookie}
	 */
	this.cookies = new Cookies();
};


Client.prototype.getCookies = function()
{
	return this.cookies;
}