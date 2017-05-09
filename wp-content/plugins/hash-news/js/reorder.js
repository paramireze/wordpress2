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
                    action: 'save_sort',
                    order: sortList.sortable( 'toArray'),
                    security: WP_ANNOUNCEMENT_LISTING.security

                },
                success: function( response ) {
                    $( 'div#message' ).remove();
                    animation.hide();
                    if (true == response.success) {
                        pageTitle.after('<div id="message" class="updated"><p>' + WP_ANNOUNCEMENTG_LISTING.success + '</p></div>')
                    } else {
                        pageTitle.after('<div id="message" class="error">' + WP_ANNOUNCEMENT_LISTING.failure + '</div>');
                    }

                },
                error: function( error ) {
                    $( 'div#message' ).remove();

                    animation.hide();
                    pageTitle.after('<div id="message" class="error">' + WP_ANNOUCEMENT_LISTING.failure + '</div>');
                }
            })
        }
    });
});