<?php

$palettes = $GLOBALS['TL_DCA']['tl_content']['palettes'];


foreach ($palettes as $k => $v) {
    if ($k != '__selector__') {

        $GLOBALS['TL_DCA']['tl_content']['palettes'][$k] .= ';{Notizmodul},qfNoteActivate';
    } else {
        $GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'qfNoteActivate';
    }
}

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['qfNoteActivate'] = 'qfNoteTitle,qfNoteText';


$GLOBALS['TL_DCA']['tl_content']['fields']['qfNoteActivate'] = array
(
    'label'                   => array('Notizmodul aktivieren'),
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'checkbox',
    'eval' => array('submitOnChange' => true),
    'sql' => "char(1) NOT NULL default ''",
);


$GLOBALS['TL_DCA']['tl_content']['fields']['qfNoteTitle'] = array
(
    'label' => array('Notizen Titel'),
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => array('maxlength' => 200),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['qfNoteText'] = array
(
    'label' => array('Notiz Inhalt'),
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('mandatory' => true, 'rte' => 'tinyMCE', 'helpwizard' => true),
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
);







