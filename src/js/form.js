var form = {
        listener: '.form'
    }

$(document).ready(function() {

    // Form Handler
    $(form.listener).on('submit', function(e) {

        // Prevent default action
        e.preventDefault();

        // Setup variables
        var action = $(this).attr('action'),
            method = $(this).attr('method');

        // Insert validation function here
        if ( !form_is_valid() ) {
            // Stop
        } else {
            // Continue
        }

    })

});
