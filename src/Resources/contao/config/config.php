<?php

/*
 * This file is part of Contao.
 *
 * (c) querformat GmbH
 *
 * @license LGPL-3.0-or-later
 */

// Back end modules

$GLOBALS['BE_MOD']['content']['note'] = array(
    'tables' => array('tl_content')
);

if (TL_MODE == 'FE') {
    $GLOBALS['TL_CSS'][] = 'bundles/querformatnote/assets/css/qfNotesPlugin.css|static';
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/querformatnote/assets/js/qfNotesPlugin.js|static';
}

$GLOBALS['TL_HOOKS']['getContentElement'][] = ['Querformat\\NoteBundle\\NotesPlugin', 'myGetContentElement'];
