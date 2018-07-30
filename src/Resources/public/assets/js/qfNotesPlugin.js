// Javascript code for qfNotesPlugin

(function ($) {

    $(document).ready(function () {

        let $qfNotesSvg = $('.qf-note__svg');
        let $qfNotes = $('.qf-note');

        $(document).click(function () {

            $qfNotesSvg.each(function () {
                $(this).next().removeClass('qf-note__content--active');
            });

        });

        $qfNotes.click(function (event) {
            event.stopImmediatePropagation();
        });

        $qfNotesSvg.click(function (event) {
            event.stopImmediatePropagation();
            $(this).next().toggleClass('qf-note__content--active');
        });

    });

})(jQuery);