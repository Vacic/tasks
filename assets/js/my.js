$(document).ready(function(){
    $('.profile-img').click(function(){
        $('#modal').modal('show');
    });
    $(document).keyup(function (event) {
        if (event.keyCode == 27) {
            $('#modal').modal('hide');
        }
    });
    $(document).click(function(e){
        if (!$(e.target).is('.modal-content, .profile-img, form, .dz-message, .dz-hidden-input')) {
            $('#modal').modal('hide');
        }
    });
    $('#profile-name').hover(function(){
        $(this).css({'border':'2px solid rgb(142, 142, 142)', 'border-radius':'20px', 'cursor':'pointer'})
        $('.fa-pencil-square-o').css({'display':'inline-block'});
        $('.divider').css({'display':'inline'});
    }, function(){
        $(this).css({ 'border': '2px solid white' });
        $('.fa-pencil-square-o').css({ 'display': 'none' });
        $('.divider').css({ 'display': 'none' });
    });
    $('#profile-name').click(function(){
        $(this).toggle();
        $('.profile-name-form').toggle();
        if ($('.focus').focus()){
            $('body').click(function(e){
                if(!$(e.target).is('.profile-name, .fa, #profile-name, .profile-name-form input')){
                    $('.profile-name-form').hide();
                    $('#profile-name').show();
                }
            });
        }
    });
    $(document).keyup(function(event){
        if (event.keyCode == 27) {
            $('.profile-name-form').hide();
            $('#profile-name').show();
        }
    });
    setTimeout(function(){
        $('.message').slideUp();
    }, 3000);
});