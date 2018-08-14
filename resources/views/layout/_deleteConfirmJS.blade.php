$('#confirmDelete').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).data('message');
    $(this).find('.modal-body p').html($message);
    $title = $(e.relatedTarget).data('title');
    $(this).find('.modal-title').html($title);

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
});
