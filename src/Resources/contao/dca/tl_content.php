<?php


$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('tl_content_qf', 'modifyDcaPalettes');

class tl_content_qf extends tl_content
{
    public function modifyDcaPalettes()
    {

        $currentPalettes = $GLOBALS['TL_DCA']['tl_content']['palettes'];


        foreach ($currentPalettes as $paletteKey => $currentPalette) {
            if ($paletteKey != '__selector__') {
                $GLOBALS['TL_DCA']['tl_content']['palettes'][$paletteKey] .= ';{Notizmodul},qfNoteActivate,title';
            } else {
                $GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'qfNoteActivate';
            }
        }
    }
}

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['qfNoteActivate'] = 'qfNoteTitle,qfNoteText';



$GLOBALS['TL_DCA']['tl_content']['fields']['qfNoteActivate'] = array
(
    'label' => array('Notizmodul aktivieren'),
    'exclude' => true,
    'search' => true,
    'inputType' => 'checkbox',
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
    'inputType' => 'text',
    'explanation' => 'insertTags',
    'sql' => "text NULL"
);



