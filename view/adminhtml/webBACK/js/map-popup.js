define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function($) {
    'use strict';
    return function (optionsConfig) {
        var mapPopup = $('<div/>').html(optionsConfig.html).modal({
            modalClass: 'changelog',
            title: $.mage.__('Choose a location'),
            buttons: [{
                text: 'Ok',
                click: function () {
                    this.closeModal();
                }
            }]
        });
        $('#map-popup').on('click', function() {
            mapPopup.modal('openModal');
        });
    };
});
