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
                    order: sortList.sortable( 'toArray').toString()
                },
                success: function( response ) {
                    animation.hide();
                    pageTitle.after('<div class="updated"><p>Jobs sort order has been saved</p></div>')

                },
                error: function( error ) {
                    animation.hide();
                    pageTitle.after('<div class="error">Failed</div>');
                }
            })
        }
    });
});