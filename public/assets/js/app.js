$(document).ready(function () {

    $('.btn-vote').click(function (e) {
        e.preventDefault();

        var form = $('#form-vote');
        var button = $(this);
        var ticket = button.closest('.ticket');
        var id = ticket.data('id');
        var action = form.attr('action').replace(':id', id);

        button.addClass('hidden');

        $.post(action, form.serialize(), function (respose) {
            ticket.find('.btn-unvote').removeClass('hidden');
        }).fail(function () {
            button.removeClass('hidden');
        });
    })
});
