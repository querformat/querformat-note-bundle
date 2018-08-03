<?php
/*
$palettes = $GLOBALS['TL_DCA']['tl_user']['palettes'];

foreach ($palettes as $k => $v) {
    if ($k != '__selector__') {
        $GLOBALS['TL_DCA']['tl_user']['palettes'][$k] .= ';{Notizmodul},qfNoteFeActive';
    }
}

$GLOBALS['TL_DCA']['tl_user']['fields']['qfNoteFeActive'] = array
(
    'label' => array('Notizmodul im Frontend aktivieren'),
    'exclude' => false,
    'search' => true,
    'inputType' => 'checkbox',
    'eval' => array('submitOnChange' => true),
    'sql' => "char(1) NOT NULL default ''",
); */