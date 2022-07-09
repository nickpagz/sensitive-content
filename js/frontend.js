const contentWarnings = document.querySelectorAll( '.content-warning' );

contentWarnings.forEach( ( item, i ) => {
    item.addEventListener( 'click', function() {
        item.remove();
    } );
} );
