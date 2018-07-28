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
    public function displayNotes(ContentModel $objElement, $strBuffer)
    {

        if ($this->showNotesToCurrentUser()):

            $note = $this->getNoteIfExists($objElement->id);

            if ($note != false && $note['qfNoteActivate'] == 1) {
                return $strBuffer . '<h3>' . $note['qfNoteTitle'] . '</h3>' . '<p>' . $note['qfNoteText'] . '</p>';
            }

        endif;

        return $strBuffer;

    }

    /**
     * @param $contentId
     * @return array|false
     */
    private function getNoteIfExists($contentId)
    {
        $db = Database::getInstance();
        return $db->prepare('SELECT qfNoteActivate,qfNoteText,qfNoteTitle FROM tl_content WHERE id=?')
            ->execute($contentId)
            ->fetchAssoc();
    }

    /**
     * @return boolean
     */
    private function showNotesToCurrentUser()
    {
        $currentUser = BackendUser::getInstance();
        return $currentUser->getData()['qfNoteFeActive'];
    }


}