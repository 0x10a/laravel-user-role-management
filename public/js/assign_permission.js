$('#AllCheck').on('change', function () {

    if($(this).prop('checked')){
        $('.sections').prop('checked', true);
        $('.permissions').prop('checked', true);
    }
    else {
        $('.sections').prop('checked', false);
        $('.permissions').prop('checked', false);
    }

});

$('.sections').on('change', function () {

    if($(this).prop('checked')){


        $('#AllCheck').prop('checked', (($('.sections:checked').length == $('.sections').length)?true:false));

        $('.'+$(this).prop('id')).prop('checked', true);
    }
    else {

        $('#AllCheck').prop('checked', (($('.sections:checked').length == $('.sections').length)?true:false));

        $('.'+$(this).prop('id')).prop('checked', false);
    }

});

$('.permissions').on('change', function () {

    var Section = $(this).attr('class').split(' ')[0];

    if($(this).prop('checked')){

        $('#'+Section).prop('checked', (($('.'+Section+':checked').length == $('.'+Section).length)?true:false));
        $('#AllCheck').prop('checked', (($('.sections:checked').length == $('.sections').length)?true:false));

        $('.'+$(this).prop('id')).prop('checked', true);
    }
    else {

        $('#'+Section).prop('checked', (($('.'+Section+':checked').length == $('.'+Section).length)?true:false));
        $('#AllCheck').prop('checked', (($('.sections:checked').length == $('.sections').length)?true:false));


        $('.'+$(this).prop('id')).prop('checked', false);
    }

});



