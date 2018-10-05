<?php
namespace LTH\LthQuiz\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class QuestionControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Controller\QuestionController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\LTH\LthQuiz\Controller\QuestionController::class)
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
    public function listActionFetchesAllQuestionsFromRepositoryAndAssignsThemToView()
    {

        $allQuestions = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $questionRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $questionRepository->expects(self::once())->method('findAll')->will(self::returnValue($allQuestions));
        $this->inject($this->subject, 'questionRepository', $questionRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('questions', $allQuestions);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenQuestionToView()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('question', $question);

        $this->subject->showAction($question);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenQuestionToQuestionRepository()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();

        $questionRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $questionRepository->expects(self::once())->method('add')->with($question);
        $this->inject($this->subject, 'questionRepository', $questionRepository);

        $this->subject->createAction($question);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenQuestionToView()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('question', $question);

        $this->subject->editAction($question);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenQuestionInQuestionRepository()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();

        $questionRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $questionRepository->expects(self::once())->method('update')->with($question);
        $this->inject($this->subject, 'questionRepository', $questionRepository);

        $this->subject->updateAction($question);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenQuestionFromQuestionRepository()
    {
        $question = new \LTH\LthQuiz\Domain\Model\Question();

        $questionRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $questionRepository->expects(self::once())->method('remove')->with($question);
        $this->inject($this->subject, 'questionRepository', $questionRepository);

        $this->subject->deleteAction($question);
    }
}
