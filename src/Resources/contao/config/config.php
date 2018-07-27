<?php

/*
 * This file is part of Contao.
 *
 * (c) querformat GmbH
 *
 * @license LGPL-3.0-or-later
 */

// Back end modules

$GLOBALS['BE_MOD']['content']['note'] = array
(

    'tables' => array('tl_content')

);

// Front end modules
$GLOBALS['FE_MOD']['note'] = array

(
    'qfNoteTitle' => 'ModuleQfNote'

);