jQuery(document).ready(fetch_data);

function fetch_data(){
    jQuery( function( $ ) {
        let timeout;

        $('.woocommerce').on('change', 'input.qty', function(){

            if ( timeout !== undefined ) {
                clearTimeout( timeout );
            }
            timeout = setTimeout(function() {
                $("[name='update_cart']").trigger("click"); // trigger cart update
            }, 1000 ); // 1 second delay, half a second (500) seems comfortable too
        });
    } );
}