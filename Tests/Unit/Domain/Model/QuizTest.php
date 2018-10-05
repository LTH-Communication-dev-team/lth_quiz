<?php
namespace LTH\LthQuiz\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class QuizTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Domain\Model\Quiz
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \LTH\LthQuiz\Domain\Model\Quiz();
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
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getResdescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getResdescription()
        );

    }

    /**
     * @test
     */
    public function setResdescriptionForStringSetsResdescription()
    {
        $this->subject->setResdescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'resdescription',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getQuestionReturnsInitialValueForQuestion()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getQuestion()
        );

    }

    /**
     * @test
     */
    public function setQuestionForObjectStorageContainingQuestionSetsQuestion()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();
        $objectStorageHoldingExactlyOneQuestion = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneQuestion->attach($question);
        $this->subject->setQuestion($objectStorageHoldingExactlyOneQuestion);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneQuestion,
            'question',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addQuestionToObjectStorageHoldingQuestion()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();
        $questionObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $questionObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($question));
        $this->inject($this->subject, 'question', $questionObjectStorageMock);

        $this->subject->addQuestion($question);
    }

    /**
     * @test
     */
    public function removeQuestionFromObjectStorageHoldingQuestion()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();
        $questionObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $questionObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($question));
        $this->inject($this->subject, 'question', $questionObjectStorageMock);

        $this->subject->removeQuestion($question);

    }

    /**
     * @test
     */
    public function getLevelReturnsInitialValueForLevel()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getLevel()
        );

    }

    /**
     * @test
     */
    public function setLevelForObjectStorageContainingLevelSetsLevel()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();
        $objectStorageHoldingExactlyOneLevel = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneLevel->attach($level);
        $this->subject->setLevel($objectStorageHoldingExactlyOneLevel);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneLevel,
            'level',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addLevelToObjectStorageHoldingLevel()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();
        $levelObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $levelObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($level));
        $this->inject($this->subject, 'level', $levelObjectStorageMock);

        $this->subject->addLevel($level);
    }

    /**
     * @test
     */
    public function removeLevelFromObjectStorageHoldingLevel()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();
        $levelObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $levelObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($level));
        $this->inject($this->subject, 'level', $levelObjectStorageMock);

        $this->subject->removeLevel($level);

    }
}
