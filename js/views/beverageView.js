var app = app || {};

(function ($) {
	'use strict';

	app.BeverageView = Backbone.View.extend({
		tagName:  'tr',

		// Cache the template function for a single item.
		template: _.template($('#item-template').html()),

		events: {
			'click td': '_openModal'
		},

		_openModal: function() {
			$('#beverage').html(this.model.get('beverage'));
			$('#apk').html(this.model.get('apk'));

			$('#apk-modal').modal();
		},

		// Re-render the titles of the item.
		render: function () {

			console.log("render beveraview");
			if (this.model.changed.id !== undefined) {
				return;
			}

			this.$el.html(this.template(this.model.toJSON()));

			return this;
		}
	});
})(jQuery);
