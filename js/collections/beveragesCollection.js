var app = app || {};

(function () {
	'use strict';

	var BeveragesCollection = Backbone.Collection.extend({
		// Reference to this collection's model.
		model: app.Beverage,
		url: location.href+'api.php'
	});

	app.BeveragesCollection = new BeveragesCollection();
})();
