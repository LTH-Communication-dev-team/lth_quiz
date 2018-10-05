<?php
namespace LTH\LthQuiz\Domain\Model;

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
 * Question
 */
class Question extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * commentcorrect
     *
     * @var string
     * @validate NotEmpty
     */
    protected $commentcorrect = '';

    /**
     * commentincorrect
     *
     * @var string
     * @validate NotEmpty
     */
    protected $commentincorrect = '';

    /**
     * answer
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Answer>
     * @cascade remove
     */
    protected $answer = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->answer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the commentcorrect
     *
     * @return string $commentcorrect
     */
    public function getCommentcorrect()
    {
        return $this->commentcorrect;
    }

    /**
     * Sets the commentcorrect
     *
     * @param string $commentcorrect
     * @return void
     */
    public function setCommentcorrect($commentcorrect)
    {
        $this->commentcorrect = $commentcorrect;
    }

    /**
     * Returns the commentincorrect
     *
     * @return string $commentincorrect
     */
    public function getCommentincorrect()
    {
        return $this->commentincorrect;
    }

    /**
     * Sets the commentincorrect
     *
     * @param string $commentincorrect
     * @return void
     */
    public function setCommentincorrect($commentincorrect)
    {
        $this->commentincorrect = $commentincorrect;
    }

    /**
     * Adds a Answer
     *
     * @param \LTH\LthQuiz\Domain\Model\Answer $answer
     * @return void
     */
    public function addAnswer(\LTH\LthQuiz\Domain\Model\Answer $answer)
    {
        $this->answer->attach($answer);
    }

    /**
     * Removes a Answer
     *
     * @param \LTH\LthQuiz\Domain\Model\Answer $answerToRemove The Answer to be removed
     * @return void
     */
    public function removeAnswer(\LTH\LthQuiz\Domain\Model\Answer $answerToRemove)
    {
        $this->answer->detach($answerToRemove);
    }

    /**
     * Returns the answer
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Answer> $answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Sets the answer
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Answer> $answer
     * @return void
     */
    public function setAnswer(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $answer)
    {
        $this->answer = $answer;
    }
}
