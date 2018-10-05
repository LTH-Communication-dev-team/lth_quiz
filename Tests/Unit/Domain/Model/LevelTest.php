<?php
namespace LTH\LthQuiz\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class LevelTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Domain\Model\Level
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \LTH\LthQuiz\Domain\Model\Level();
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
}
