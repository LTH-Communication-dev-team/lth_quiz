<?php
namespace LTH\LthQuiz\Domain\Repository;

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
 * The repository for Quizzes
 */
class QuizRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );
    
}