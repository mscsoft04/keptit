$( document ).ready(function() {
    $('.forgot-sec').hide();
    $('#forgotPass').on('click', function(){
        $('.login-sec').hide();
        $('.forgot-sec').show();
    });
    $('#cancel').on('click', function(){
         $('.login-sec').show();
        $('.forgot-sec').hide();
    });
});
