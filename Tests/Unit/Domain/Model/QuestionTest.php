<?php
namespace LTH\LthQuiz\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class QuestionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Domain\Model\Question
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \LTH\LthQuiz\Domain\Model\Question();
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
    public function getCommentcorrectReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCommentcorrect()
        );

    }

    /**
     * @test
     */
    public function setCommentcorrectForStringSetsCommentcorrect()
    {
        $this->subject->setCommentcorrect('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'commentcorrect',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getCommentincorrectReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCommentincorrect()
        );

    }

    /**
     * @test
     */
    public function setCommentincorrectForStringSetsCommentincorrect()
    {
        $this->subject->setCommentincorrect('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'commentincorrect',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getAnswerReturnsInitialValueForAnswer()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAnswer()
        );

    }

    /**
     * @test
     */
    public function setAnswerForObjectStorageContainingAnswerSetsAnswer()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();
        $objectStorageHoldingExactlyOneAnswer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAnswer->attach($answer);
        $this->subject->setAnswer($objectStorageHoldingExactlyOneAnswer);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAnswer,
            'answer',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addAnswerToObjectStorageHoldingAnswer()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();
        $answerObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $answerObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($answer));
        $this->inject($this->subject, 'answer', $answerObjectStorageMock);

        $this->subject->addAnswer($answer);
    }

    /**
     * @test
     */
    public function removeAnswerFromObjectStorageHoldingAnswer()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();
        $answerObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $answerObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($answer));
        $this->inject($this->subject, 'answer', $answerObjectStorageMock);

        $this->subject->removeAnswer($answer);

    }
}
