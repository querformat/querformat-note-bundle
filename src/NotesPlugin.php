<?php

namespace Querformat\NoteBundle;

use Contao\ContentModel;
use Contao\Database;
use Contao\BackendUser;
use Symfony\Component\Security\Core\User\UserInterface;

class NotesPlugin extends \Frontend
{


    /**
     * @param ContentModel $objElement
     * @param $strBuffer
     * @return string
     */
    public function displayNotes(ContentModel $objElement, $strBuffer)
    {
        if ($this->showNotesToCurrentUser()):

            //$note = $this->getNoteIfExists($objElement->id);

            // $note['qfNoteActivate'] gibt ein boolschen Wert zurück (true == 1, false == 0) und
            // kann deswegen ohne vergleichsoperator direkt in die If-Abfrage gschrieben werden.
            /** @var Boolean $note */

            if ($objElement->qfNoteActivate == 1) {
                return '<div style="position:relative;">' . $strBuffer . $this->getNoteHtml($objElement) . '</div>';
            }

        endif;

        return $strBuffer;
    }


    /**
     * Show Notes to current logged in user if he got the rights to do so
     *
     * @return boolean
     */
    private function showNotesToCurrentUser()
    {
        $currentUser = BackendUser::getInstance();
        return $currentUser->getData()['qfNoteFeActive'];
    }

    /**
     * @param $note
     * @return string
     */

    private function getNoteHtml($note)
    {

        if (TL_MODE == 'FE') {

            $returnHtml = '<div class="qf-note">';
            $returnHtml .= '<svg class="qf-note__svg" id="Ebene_1" data-name="Ebene 1" viewBox="0 0 38 38">';
            $returnHtml .= '<path d="M27 21.66V27a2 2 0 0 1-2 2H11a2 2 0 0 1-2-2V13a2 2 0 0 1 2-2h5.34" class="qf-edit"/>';
            $returnHtml .= '<path d="M25 9l4 4-10 10h-4v-4L25 9z" class="qf-edit"/>';
            $returnHtml .= '</svg>';
            $returnHtml .= '<div class="qf-note__content">';
            $returnHtml .= '<p class="qf-note__title">' . $note->qfNoteTitle . '</p>';
            if ($note->qfNoteText != ''):
                $returnHtml .= '<p class="qf-note__text">' . $note->qfNoteText . '</p>';
            endif;
            $returnHtml .= '</div></div>';
            return $returnHtml;
        }
    }


}