<?php
namespace LTH\LthQuiz\Controller;

/***
 *
 * This file is part of the "LTH Quiz" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Tomas Havner <tomas.havner@kansli.lth.se>, LTH
 *
 ***/

/**
 * AnswerController
 */
class AnswerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $answers = $this->answerRepository->findAll();
        $this->view->assign('answers', $answers);
    }

    /**
     * action show
     *
     * @param \LTH\LthQuiz\Domain\Model\Answer $answer
     * @return void
     */
    public function showAction(\LTH\LthQuiz\Domain\Model\Answer $answer)
    {
        $this->view->assign('answer', $answer);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \LTH\LthQuiz\Domain\Model\Answer $newAnswer
     * @return void
     */
    public function createAction(\LTH\LthQuiz\Domain\Model\Answer $newAnswer)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->answerRepository->add($newAnswer);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \LTH\LthQuiz\Domain\Model\Answer $answer
     * @ignorevalidation $answer
     * @return void
     */
    public function editAction(\LTH\LthQuiz\Domain\Model\Answer $answer)
    {
        $this->view->assign('answer', $answer);
    }

    /**
     * action update
     *
     * @param \LTH\LthQuiz\Domain\Model\Answer $answer
     * @return void
     */
    public function updateAction(\LTH\LthQuiz\Domain\Model\Answer $answer)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->answerRepository->update($answer);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \LTH\LthQuiz\Domain\Model\Answer $answer
     * @return void
     */
    public function deleteAction(\LTH\LthQuiz\Domain\Model\Answer $answer)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->answerRepository->remove($answer);
        $this->redirect('list');
    }
}
