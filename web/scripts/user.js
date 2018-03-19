$(function() {
    $('.dropdown').on('click', function () {
        $(this).toggleClass('open');
    });
    
    $(".credits .list-group-item").on("click", function(){
        $(".credits .active").removeClass('active');
        $(this).addClass('active');
        let stat = $(this).attr('data-filter');
        if (stat>0) {
            $('.credit-item[data-status != '+stat+']').hide();
            $('.credit-item[data-status = '+stat+']').show();    
        } else {
            $('.credit-item').show();    
        }
        
    });
    
    
})
