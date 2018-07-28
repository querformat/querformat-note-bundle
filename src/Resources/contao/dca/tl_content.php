<?php

$dcaTemplates = $GLOBALS['TL_DCA'];


foreach ($dcaTemplates as $dcaKey => $dcaTemplate) {

    if ($dcaKey == 'tl_content' || $dcaKey == 'tl_article' || $dcaKey == 'tl_dma_eg'):

        $currentPalettes = $GLOBALS['TL_DCA'][$dcaKey]['palettes'];

        foreach ($currentPalettes as $paletteKey => $currentPalette) {
            if ($paletteKey != '__selector__') {
                $GLOBALS['TL_DCA'][$dcaKey]['palettes'][$paletteKey] .= ';{Notizmodul},qfNoteActivate';
            } else {
                $GLOBALS['TL_DCA'][$dcaKey]['palettes']['__selector__'][] = 'qfNoteActivate';
            }
        }

        $GLOBALS['TL_DCA'][$dcaKey]['subpalettes']['qfNoteActivate'] = 'qfNoteTitle,qfNoteText';

        $GLOBALS['TL_DCA'][$dcaKey]['fields']['qfNoteActivate'] = array
        (
            'label' => array('Notizmodul aktivieren'),
            'exclude' => true,
            'search' => true,
            'inputType' => 'checkbox',
            'eval' => array('submitOnChange' => true),
            'sql' => "char(1) NOT NULL default ''",
        );


        $GLOBALS['TL_DCA'][$dcaKey]['fields']['qfNoteTitle'] = array
        (
            'label' => array('Notizen Titel'),
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array('maxlength' => 200),
            'sql' => "varchar(255) NOT NULL default ''"
        );

        $GLOBALS['TL_DCA'][$dcaKey]['fields']['qfNoteText'] = array
        (
            'label' => array('Notiz Inhalt'),
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'rte' => 'tinyMCE', 'helpwizard' => true),
            'explanation' => 'insertTags',
            'sql' => "mediumtext NULL"
        );

    endif;

}