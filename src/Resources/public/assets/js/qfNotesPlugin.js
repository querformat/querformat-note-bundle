// Javascript code for qfNotesPlugin

(function ($) {

    $(document).ready(function () {

        let $qfNotes = $('.qf-note');

        $qfNotes.click(function () {
            $(this).find('.qf-note__content').toggleClass('qf-note__content--active');
        });

    });

})(jQuery);