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
 * QuestionController
 */
class QuestionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $questions = $this->questionRepository->findAll();
        $this->view->assign('questions', $questions);
    }

    /**
     * action show
     *
     * @param \LTH\LthQuiz\Domain\Model\Question $question
     * @return void
     */
    public function showAction(\LTH\LthQuiz\Domain\Model\Question $question)
    {
        $this->view->assign('question', $question);
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
     * @param \LTH\LthQuiz\Domain\Model\Question $newQuestion
     * @return void
     */
    public function createAction(\LTH\LthQuiz\Domain\Model\Question $newQuestion)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->questionRepository->add($newQuestion);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \LTH\LthQuiz\Domain\Model\Question $question
     * @ignorevalidation $question
     * @return void
     */
    public function editAction(\LTH\LthQuiz\Domain\Model\Question $question)
    {
        $this->view->assign('question', $question);
    }

    /**
     * action update
     *
     * @param \LTH\LthQuiz\Domain\Model\Question $question
     * @return void
     */
    public function updateAction(\LTH\LthQuiz\Domain\Model\Question $question)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->questionRepository->update($question);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \LTH\LthQuiz\Domain\Model\Question $question
     * @return void
     */
    public function deleteAction(\LTH\LthQuiz\Domain\Model\Question $question)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->questionRepository->remove($question);
        $this->redirect('list');
    }
}
