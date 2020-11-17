(function ($) {
    var autoCompleteSource = urlToAutoCompleteAction; // Attention
    $('#autocomplete').autocomplete({
        source: autoCompleteSource,
        minLength: 1
    });
}) (jQuery);