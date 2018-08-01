<?php

/*
 * This file is part of Contao.
 *
 * (c) querformat GmbH
 *
 * @license LGPL-3.0-or-later
 */

// Init backend menu item
/*
$GLOBALS['BE_MOD']['content']['note'] = array(
    'tables' => array('tl_content')
);
*/

// Integrate extension specific javascript and css files
if (TL_MODE == 'FE') {
    $GLOBALS['TL_CSS'][] = 'bundles/querformatnote/assets/css/qfNotesPlugin.css|static';
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/querformatnote/assets/js/qfNotesPlugin.js|static';
}

// Hooks
$GLOBALS['TL_HOOKS']['getContentElement'][] = ['Querformat\\NoteBundle\\NotesPlugin', 'displayNotes'];
$GLOBALS['TL_HOOKS']['generatePage'][] = ['Querformat\\NoteBundle\\NotesPlugin', 'setNoteCookie'];


// DMA-Elemente zeigen kein Notizmodul trotz Vorhandensein der Einstellung

//$GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('MyClass', 'myOutputBackendTemplate');

/*
class MyClass
{
    public function myOutputBackendTemplate()
    {
       echo "<pre>";
       print_r($GLOBALS['TL_DCA']['tl_dma_eg']);
       DIE;
    }
}
*/

