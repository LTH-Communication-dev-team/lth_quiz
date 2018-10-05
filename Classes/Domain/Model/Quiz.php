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
 * Quiz
 */
class Quiz extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * resdescription
     *
     * @var string
     */
    protected $resdescription = '';

    /**
     * question
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Question>
     * @cascade remove
     */
    protected $question = null;

    /**
     * level
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Level>
     * @cascade remove
     */
    protected $level = null;

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
        $this->question = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->level = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the resdescription
     *
     * @return string $resdescription
     */
    public function getResdescription()
    {
        return $this->resdescription;
    }

    /**
     * Sets the resdescription
     *
     * @param string $resdescription
     * @return void
     */
    public function setResdescription($resdescription)
    {
        $this->resdescription = $resdescription;
    }

    /**
     * Adds a Question
     *
     * @param \LTH\LthQuiz\Domain\Model\Question $question
     * @return void
     */
    public function addQuestion(\LTH\LthQuiz\Domain\Model\Question $question)
    {
        $this->question->attach($question);
    }

    /**
     * Removes a Question
     *
     * @param \LTH\LthQuiz\Domain\Model\Question $questionToRemove The Question to be removed
     * @return void
     */
    public function removeQuestion(\LTH\LthQuiz\Domain\Model\Question $questionToRemove)
    {
        $this->question->detach($questionToRemove);
    }

    /**
     * Returns the question
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Question> $question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Sets the question
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Question> $question
     * @return void
     */
    public function setQuestion(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $question)
    {
        $this->question = $question;
    }

    /**
     * Adds a Level
     *
     * @param \LTH\LthQuiz\Domain\Model\Level $level
     * @return void
     */
    public function addLevel(\LTH\LthQuiz\Domain\Model\Level $level)
    {
        $this->level->attach($level);
    }

    /**
     * Removes a Level
     *
     * @param \LTH\LthQuiz\Domain\Model\Level $levelToRemove The Level to be removed
     * @return void
     */
    public function removeLevel(\LTH\LthQuiz\Domain\Model\Level $levelToRemove)
    {
        $this->level->detach($levelToRemove);
    }

    /**
     * Returns the level
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Level> $level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Sets the level
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\LTH\LthQuiz\Domain\Model\Level> $level
     * @return void
     */
    public function setLevel(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $level)
    {
        $this->level = $level;
    }
}
