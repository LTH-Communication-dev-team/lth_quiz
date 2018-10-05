<?php
namespace LTH\LthQuiz\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class AnswerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Controller\AnswerController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\LTH\LthQuiz\Controller\AnswerController::class)
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
    public function listActionFetchesAllAnswersFromRepositoryAndAssignsThemToView()
    {

        $allAnswers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $answerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $answerRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAnswers));
        $this->inject($this->subject, 'answerRepository', $answerRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('answers', $allAnswers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAnswerToView()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('answer', $answer);

        $this->subject->showAction($answer);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenAnswerToAnswerRepository()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();

        $answerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $answerRepository->expects(self::once())->method('add')->with($answer);
        $this->inject($this->subject, 'answerRepository', $answerRepository);

        $this->subject->createAction($answer);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAnswerToView()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('answer', $answer);

        $this->subject->editAction($answer);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAnswerInAnswerRepository()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();

        $answerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $answerRepository->expects(self::once())->method('update')->with($answer);
        $this->inject($this->subject, 'answerRepository', $answerRepository);

        $this->subject->updateAction($answer);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAnswerFromAnswerRepository()
    {
        $answer = new \LTH\LthQuiz\Domain\Model\Answer();

        $answerRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $answerRepository->expects(self::once())->method('remove')->with($answer);
        $this->inject($this->subject, 'answerRepository', $answerRepository);

        $this->subject->deleteAction($answer);
    }
}
