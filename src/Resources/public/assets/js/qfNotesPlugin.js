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


        /* DYNAMIC POSITION C0ORDINATES FOR NOTE ELEMENTS */
        function qfSetCoor(status) {

            if (status == 'onload') {

                $qfNotes.each(function () {
                    let $qfNotePosition = $(this).prev().offset();
                    $(this).prev().attr('data-qfNoteId', $(this).attr('id'));

                    $(this).css({
                        left: $qfNotePosition.left,
                        top: $qfNotePosition.top
                    });
                    $('body').append($(this));
                });


            } else {

                $qfNotes.each(function () {
                    let $qfNotePosition = $('[data-qfNoteId="' + $(this).attr('id') + '"]').offset();

                    $(this).css({
                        left: $qfNotePosition.left,
                        top: $qfNotePosition.top
                    });
                });


            }
        }

        qfSetCoor('onload');
        $(window).on('resize', function () {
            qfSetCoor('resize')
        });

        /* TOOLBAR */


        $('.qf-note__visible').on('click', function () {
            $(this).toggleClass('qf-note__toogle');
            $('.qf-note').fadeToggle();
        });

        $('.qf-note__close').on('click', function () {
            $(this).toggleClass('qf-note__toogle');
            $('.qf-note').fadeToggle();
            $('.qf-toolbar ').fadeToggle();
        });

        $('.qf-note__info').on('click', function () {
            $('.qf-note__infobox').fadeToggle();
        });

    });

})(jQuery);