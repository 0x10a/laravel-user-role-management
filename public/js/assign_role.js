/**
 * Created by Bilal Younas on 5/21/2017.
 */

$('#AllCheck').on('change', function () {

    if($(this).prop('checked')){
        $('.roles').prop('checked', true);
    }
    else {
        $('.roles').prop('checked', false);
    }

});

$('.roles').on('change', function () {

    var Section = $(this).attr('class').split(' ')[0];

    if($(this).prop('checked')){

        $('#AllCheck').prop('checked', (($('.roles:checked').length == $('.roles').length)?true:false));

    }
    else {

        $('#AllCheck').prop('checked', (($('.roles:checked').length == $('.roles').length)?true:false));

    }

});



