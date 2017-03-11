var Cookies = function()
{
	this.set = function(name, value)
	{
		$.cookie(name, value);
	};

	this.get = function(name)
	{
		return $.cookie(name);
	};

	this.remove = function(name)
	{
		return $.removeCookie(name);
	};
};

