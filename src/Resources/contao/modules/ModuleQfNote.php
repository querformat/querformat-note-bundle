<?php

class ModuleQfNote extends Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_qfnote';


    protected function compile()
    {

        $this->Template->qfNoteTitle = '-- NOTE --';

    }
}