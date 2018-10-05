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
 * LevelController
 */
class LevelController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $levels = $this->levelRepository->findAll();
        $this->view->assign('levels', $levels);
    }

    /**
     * action show
     *
     * @param \LTH\LthQuiz\Domain\Model\Level $level
     * @return void
     */
    public function showAction(\LTH\LthQuiz\Domain\Model\Level $level)
    {
        $this->view->assign('level', $level);
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
     * @param \LTH\LthQuiz\Domain\Model\Level $newLevel
     * @return void
     */
    public function createAction(\LTH\LthQuiz\Domain\Model\Level $newLevel)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->levelRepository->add($newLevel);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \LTH\LthQuiz\Domain\Model\Level $level
     * @ignorevalidation $level
     * @return void
     */
    public function editAction(\LTH\LthQuiz\Domain\Model\Level $level)
    {
        $this->view->assign('level', $level);
    }

    /**
     * action update
     *
     * @param \LTH\LthQuiz\Domain\Model\Level $level
     * @return void
     */
    public function updateAction(\LTH\LthQuiz\Domain\Model\Level $level)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->levelRepository->update($level);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \LTH\LthQuiz\Domain\Model\Level $level
     * @return void
     */
    public function deleteAction(\LTH\LthQuiz\Domain\Model\Level $level)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->levelRepository->remove($level);
        $this->redirect('list');
    }
}
