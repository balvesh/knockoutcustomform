define(['jquery',
    'uiComponent',
    'ko',
    'mage/url'
], function ($, Component, ko, url) {
    'use strict';
    return Component.extend({
        defaults: {
            template: 'Learning_Customform/knockouts'
        },
        initialize: function () {
            this._super();
        },
        save: function () {
            if (this.validate()) {
                var formData = $('#addData').serializeArray();
                $.ajax({
                    type: 'POST',
                    url: url.build('customform/index/submit'),
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log('SUCCESS: ', data);
                    },
                    error: function (data) {
                        console.log('ERROR: ', data);
                    },
                });
            }
        },
        validate: function () {
            const $form = $('#addData')
            $form.validation()
            return $form.valid()
        },
    });
}
);