(function($) {
    /**
     * Use this file to register a module helper that
     * adds additional logic to the settings form. The
     * method 'FLBuilder._registerModuleHelper' accepts
     * two parameters, the module slug (same as the folder name)
     * and an object containing the helper methods and properties.
     */
    FLBuilder._registerModuleHelper('inz-posts-module', {
        /**
         * The 'init' method is called by the builder when
         * the settings form is opened.
         *
         * @method init
         */
        init: function() {
            // init select2
            jQuery('.test-select').select2({
                ajax: {
                    url: ajaxurl, // AJAX URL is predefined in WordPress admin
                    dataType: 'json',
                    delay: 250, // delay in ms while typing when to perform a AJAX search
                    data: function(params) {
                        return {
                            q: params.term, // search query
                            action: 'mishagetposts' // AJAX action for admin-ajax.php
                        };
                    },
                    processResults: function(data) {
                        var options = [];
                        if (data) {
                            // data is the array of arrays, and each of them contains ID and the Label of the option
                            $.each(data, function(index, text) {
                                // do not forget that "index" is just auto incremented value
                                options.push({ id: text[0], text: text[1] });
                            });
                        }
                        return {
                            results: options
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1 // the minimum of symbols to input before perform a search
            });

            // init sortable
            jQuery('ul.select2-selection__rendered').sortable({
                containment: 'parent'
            });
        }
    });
})(jQuery);
