jQuery(document).ready(function($) {

    var sortList = $('ul#custom-type-list');
    var animation = $( '#loading-animation');
    var pageTitle = $( 'div h2' );

    sortList.sortable({
        update:function( event, ui ) {
            animation.show();

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'save_post',
                    order: sortList.sortable( 'toArray').toString(),
                    security: WP_JOB_LISTING.security

                },
                success: function( response ) {
                    $( 'div#message' ).remove();
                    animation.hide();
                    pageTitle.after('<div id="message" class="updated"><p>' + WP_JOB_LISTING.success + '</p></div>')

                },
                error: function( error ) {
                    $( 'div#message' ).remove();

                    animation.hide();
                    pageTitle.after('<div id="message" class="error">' + WP_JOB_LISTING.failure + '</div>');
                }
            })
        }
    });
});