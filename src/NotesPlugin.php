<?php


namespace Querformat\NoteBundle;

use Contao\ContentModel;


class NotesPlugin
{

    /**
     * @return bool
     */
    public function checkNoteActive()
    {
        if (!empty($_COOKIE['qfNoteBundle']) || isset($_GET['notiz'])) {
            return true;
        }
        return false;
    }

    /**
     * @param ContentModel $objElement
     * @param $strBuffer
     * @return string
     */
    public function displayNotes(ContentModel $objElement, $strBuffer)
    {
        if ($this->checkNoteActive()):


            //$note = $this->getNoteIfExists($objElement->id);

            // $note['qfNoteActivate'] gibt ein boolschen Wert zurück (true == 1, false == 0) und
            // kann deswegen ohne vergleichsoperator direkt in die If-Abfrage geschrieben werden.
            /** @var Boolean $objElement */
            if ($objElement->qfNoteActivate) {
                return $strBuffer . $this->getNoteHtml($objElement);
            }

        endif;

        return $strBuffer;
    }


    /**
     * Sets Note  Session Cookie
     */
    public function setNoteCookie()
    {

        if ($_SERVER['QUERY_STRING'] == 'notiz'):
            setcookie('qfNoteBundle', 'user', time() + 3600, '/');

        endif;
    }


    /**
     * @param $objElement
     * @return string
     */
    private function getNoteHtml($objElement)
    {

        if (TL_MODE == 'FE') {

            $returnHtml = ' <div class="qf-note" id="qfNoteId-' . $objElement->id . '">
                                 <svg class="qf-note__svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <div class="qf-note__content">
            <p class="qf-note__title">' . $objElement->qfNoteTitle . '</p>';
            if ($objElement->qfNoteText != ''):
                $returnHtml .= '<p class="qf-note__text">' . $objElement->qfNoteText . '</p>';
            endif;
            $returnHtml .= '</div></div>';
            return $returnHtml;
        }
    }

    public function createToolbar($strContent, $strTemplate)
    {


        $qfToolbar = '<div class="qf-toolbar">
                            <div class="qf-note__nav">
                                <div class="qf-note__info"> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg></div>
                                <div class="qf-note__visible">
                                    <svg class="qf-note__show" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    <svg class="qf-note__hide" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                            
                                </div>
                            </div>
                            <div  class="qf-note__close"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div>
                      </div>
                      <div class="qf-note__infobox">
                        <img src="bundles/querformatnote/assets/img/querformat-logo.png" />
                        <p>Willkommen bei unserem Notizmodul.<br>
                        Hier können Sie Notizen ein- und ausblenden. Mit Klick auf das X blenden Sie auch die Toolbar aus.</p>                      
                      </div>
                      ';

        if ($strTemplate == 'fe_page' && $this->checkNoteActive()) {
            // Modify output
            $GLOBALS['TL_HEAD'][] = $qfToolbar;


        }

        return $strContent;
    }
}
