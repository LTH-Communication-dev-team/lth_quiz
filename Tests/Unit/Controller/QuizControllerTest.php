<?php
namespace LTH\LthQuiz\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class QuizControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Controller\QuizController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\LTH\LthQuiz\Controller\QuizController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllQuizzesFromRepositoryAndAssignsThemToView()
    {

        $allQuizzes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $quizRepository = $this->getMockBuilder(\LTH\LthQuiz\Domain\Repository\QuizRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $quizRepository->expects(self::once())->method('findAll')->will(self::returnValue($allQuizzes));
        $this->inject($this->subject, 'quizRepository', $quizRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('quizzes', $allQuizzes);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenQuizToView()
    {
        $quiz = new \LTH\LthQuiz\Domain\Model\Quiz();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('quiz', $quiz);

        $this->subject->showAction($quiz);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenQuizToQuizRepository()
    {
        $quiz = new \LTH\LthQuiz\Domain\Model\Quiz();

        $quizRepository = $this->getMockBuilder(\LTH\LthQuiz\Domain\Repository\QuizRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $quizRepository->expects(self::once())->method('add')->with($quiz);
        $this->inject($this->subject, 'quizRepository', $quizRepository);

        $this->subject->createAction($quiz);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenQuizToView()
    {
        $quiz = new \LTH\LthQuiz\Domain\Model\Quiz();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('quiz', $quiz);

        $this->subject->editAction($quiz);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenQuizInQuizRepository()
    {
        $quiz = new \LTH\LthQuiz\Domain\Model\Quiz();

        $quizRepository = $this->getMockBuilder(\LTH\LthQuiz\Domain\Repository\QuizRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $quizRepository->expects(self::once())->method('update')->with($quiz);
        $this->inject($this->subject, 'quizRepository', $quizRepository);

        $this->subject->updateAction($quiz);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenQuizFromQuizRepository()
    {
        $quiz = new \LTH\LthQuiz\Domain\Model\Quiz();

        $quizRepository = $this->getMockBuilder(\LTH\LthQuiz\Domain\Repository\QuizRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $quizRepository->expects(self::once())->method('remove')->with($quiz);
        $this->inject($this->subject, 'quizRepository', $quizRepository);

        $this->subject->deleteAction($quiz);
    }
}
