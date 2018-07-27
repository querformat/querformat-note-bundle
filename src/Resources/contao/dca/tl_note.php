<?php


$GLOBALS['TL_DCA']['tl_note'] = array
(

// Config
    'config' => array
    (
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ),

// List
    'list' => array
    (
        'sorting' => array
        (
            'mode' => 2,
            'fields' => array('title'),
            'flag' => 1,
            'panelLayout' => 'filter;sort,search,limit'
        ),
        'label' => array
        (
            'fields' => array('title'),
            'format' => '%s',
        ),
        'global_operations' => array
        (
           'all' => array
            (
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_note']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.svg'
            ),
            'delete' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_note']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_note']['show'],
                'href' => 'act=show',
                'icon' => 'show.svg',
                'attributes' => 'style="margin-right:3px"'
            ),
            'css' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_note']['css'],
                'href' => 'table=tl_style_sheet',
                'icon' => 'css.svg',
                'button_callback' => array('tl_note', 'editCss')
            )
        )
    ),

// Palettes
    'palettes' => array
    (
        'default' => '{title_legend},title;{note_legend},url'
    ),

// Fields
    'fields' => array
    (
        'id' => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_note']['title'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => true,
            'flag' => 1,
            'search' => true,
            'eval' => array(
                'mandatory' => true,
                'unique' => true,
                'maxlength' => 255,
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'url' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_note']['url'],
            'inputType' => 'text',
            'exclude' => true,
            'sql' => "text NULL "
        )
    )
);