<?php
namespace LTH\LthQuiz\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class AnswerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Domain\Model\Answer
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \LTH\LthQuiz\Domain\Model\Answer();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getCorrectReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getCorrect()
        );

    }

    /**
     * @test
     */
    public function setCorrectForBoolSetsCorrect()
    {
        $this->subject->setCorrect(true);

        self::assertAttributeEquals(
            true,
            'correct',
            $this->subject
        );

    }
}
