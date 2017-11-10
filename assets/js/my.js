$(document).ready(function(){
    $('.upload-img').on('click', function(){
        if (!$('div').hasClass('dz-success-mark')) {
            $('#modal').modal('show');
        } else {
            $('#modal').hide('slow');
        }
    });
});