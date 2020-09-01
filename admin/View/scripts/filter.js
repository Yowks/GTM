$( '.filter-btn' ).click(function() {
    let id = this.dataset.status;

    if(id === 'all'){
        $( '.booking-item' ).show();
    }else{
        $( '.booking-item' ).hide();
        $( '[data-status="'+ id +'"]').show()
    }
})