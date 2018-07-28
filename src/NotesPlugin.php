<?php

namespace Querformat\NoteBundle;

use Contao\ContentModel;
use Contao\Database;
use Contao\BackendUser;

class NotesPlugin
{

    /**
     * @param $objElement
     * @param $strBuffer
     * @return string
     */
    public function myGetContentElement(ContentModel $objElement, $strBuffer)
    {

        $currentUser = BackendUser::getInstance();
        $currentUserShowNotes = $currentUser->getData()['qfNoteFeActive'];

        if ($currentUserShowNotes):

            $db = Database::getInstance();
            $currentElement = $db->execute('SELECT qfNoteActivate,qfNoteText,qfNoteTitle FROM tl_content WHERE id=' . $objElement->id)->fetchAssoc();

            if ($currentElement['qfNoteActivate'] == 1) {
                return $strBuffer . '<h3>' . $currentElement['qfNoteTitle'] . '</h3>' . '<p>' . $currentElement['qfNoteText'] . '</p>';
            }

        endif;

        return $strBuffer;

    }


}