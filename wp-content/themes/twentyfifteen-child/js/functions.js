( function( $ ) {
    $(document).ready(function () {
        var userSubmitButton = document.getElementById('user-submit-button');
        var adminAjaxRequest = function (formData, action) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: screenReaderText.adminAjax,
                data: {
                    action: action,
                    data: formData,
                    submission: document.getElementById('xyq').value,
                    security: screenReaderText.security
                },
                success: function (response) {
                    if (true === response.success) {
                        alert('this was a success');
                    } else {
                        alert('You Suck');
                    }
                }
            });
        };

        userSubmitButton.addEventListener('click', function (event) {
            event.preventDefault();
            var formData = {
                'name': document.getElementById('user-name').value,
                'email': document.getElementById('user-email').value,
                'question': document.getElementById('user-entry-content').value,
                'product': document.getElementById('product').value
            };
            adminAjaxRequest(formData, 'process_user_generated_post');
        });
    });
} )( jQuery );
