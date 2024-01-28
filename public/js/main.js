$(document).on('show.bs.modal','#remove', function (e) {
    $(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
});