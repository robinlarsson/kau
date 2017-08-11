var app = app || {};

(function () {
    'use strict';

    app.Beverage = Backbone.Model.extend({
        defaults: {
            id: 0,
            beverage: '',
            volume: 0,
            price: 0,
            percentage: 0.00,
            updatedPriceDate: '',
            typeOfBeverage: ''
        },

        parse: function(data) {
            console.log(data);
            data.updatedPriceDate = moment(data.updatedPriceDate.date).format("YYYY-MM-DD HH:mm:ss");

            return data;
        }
    });
})();
