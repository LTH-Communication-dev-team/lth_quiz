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
 * Answer
 */
class Answer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * correct
     *
     * @var bool
     * @validate NotEmpty
     */
    protected $correct = false;

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
     * Returns the correct
     *
     * @return bool $correct
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Sets the correct
     *
     * @param bool $correct
     * @return void
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;
    }

    /**
     * Returns the boolean state of correct
     *
     * @return bool
     */
    public function isCorrect()
    {
        return $this->correct;
    }
}
