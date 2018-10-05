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
 * QuizController
 */
class QuizController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * quizRepository
     *
     * @var \LTH\LthQuiz\Domain\Repository\QuizRepository
     * @inject
     */
    protected $quizRepository = null;

    /**
     * action list
     *
     * @return void
     */
    
  
    
    public function listAction()
    {
        $this->contentObj = $this->configurationManager->getContentObject();
        $pages = $this->contentObj->data['pages'];
        $this->view->assign('pages', $pages);
    }

    /**
     * action show
     *
     * @param \LTH\LthQuiz\Domain\Model\Quiz $quiz
     * @return void
     */
    public function showAction(\LTH\LthQuiz\Domain\Model\Quiz $quiz)
    {
        $this->view->assign('quiz', $quiz);
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
     * @param \LTH\LthQuiz\Domain\Model\Quiz $newQuiz
     * @return void
     */
    public function createAction(\LTH\LthQuiz\Domain\Model\Quiz $newQuiz)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->quizRepository->add($newQuiz);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \LTH\LthQuiz\Domain\Model\Quiz $quiz
     * @ignorevalidation $quiz
     * @return void
     */
    public function editAction(\LTH\LthQuiz\Domain\Model\Quiz $quiz)
    {
        $this->view->assign('quiz', $quiz);
    }

    /**
     * action update
     *
     * @param \LTH\LthQuiz\Domain\Model\Quiz $quiz
     * @return void
     */
    public function updateAction(\LTH\LthQuiz\Domain\Model\Quiz $quiz)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->quizRepository->update($quiz);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \LTH\LthQuiz\Domain\Model\Quiz $quiz
     * @return void
     */
    public function deleteAction(\LTH\LthQuiz\Domain\Model\Quiz $quiz)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->quizRepository->remove($quiz);
        $this->redirect('list');
    }
}
