var app = app || {};

(function ($) {
	'use strict';

	// Our overall **AppView** is the top-level piece of UI.
	app.AppView = Backbone.View.extend({

		// Instead of generating a new element, bind to the existing skeleton of
		// the App already present in the HTML.
		el: '.apkapp',

		// At initialization we bind to the relevant events on the records
		// collection, when items are added or changed.
		initialize: function () {
			console.log("iniit app view");
			this.$list = $('.apk-row');

			this.listenTo(app.BeveragesCollection, 'reset', this.addAll);

			// Suppresses 'add' events with {reset: true} and prevents the app view
			// from being re-rendered for every model. Only renders when the 'reset'
			// event is triggered at the end of the fetch.
			app.BeveragesCollection.fetch({ data: $.param({ action: 'list'}), reset: true });
		},

		// Add a single item to the list by creating a view for it, and
		// appending its element to the `<ul>`.
		addOne: function (beverage) {
			var view = new app.BeverageView({ model: beverage });
			this.$list.append(view.render().el);
		},

		addAll: function () {
			this.$list.html('');
			app.BeveragesCollection.each(this.addOne, this);

			jQuery('#apk-table').DataTable();
		}
	});
})(jQuery);
