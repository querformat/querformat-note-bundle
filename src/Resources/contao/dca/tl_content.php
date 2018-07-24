<?php


$palettes = $GLOBALS['TL_DCA']['tl_content']['palettes'];


foreach ($palettes as $k => $v) {
    if($k != '__selector__'){

        $palettes[$k] .= ';{Notizmodul},qfCheckbox';

    }
}


$GLOBALS['TL_DCA']['tl_content']['fields']['qfCheckbox'] = array
(
    'label'                   => array('Notizmodul aktivieren'),
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'checkbox',
    'sql'                     => "char(1) NOT NULL default ''"
);