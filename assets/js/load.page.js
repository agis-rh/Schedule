$(function() {
    $('#loading').ajaxStart(function() {
    $(this).fadeIn(500);
    }).ajaxStop(function() {
    $(this).fadeOut(500);   
    });
    
    $('.load').click(function() {
        var url = $(this).attr('href');
        $('#load-page').load(url);
        return false;
    });
});


