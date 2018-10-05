<?php
namespace LTH\LthQuiz\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Tomas Havner <tomas.havner@kansli.lth.se>
 */
class LevelControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \LTH\LthQuiz\Controller\LevelController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\LTH\LthQuiz\Controller\LevelController::class)
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
    public function listActionFetchesAllLevelsFromRepositoryAndAssignsThemToView()
    {

        $allLevels = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $levelRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $levelRepository->expects(self::once())->method('findAll')->will(self::returnValue($allLevels));
        $this->inject($this->subject, 'levelRepository', $levelRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('levels', $allLevels);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenLevelToView()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('level', $level);

        $this->subject->showAction($level);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenLevelToLevelRepository()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();

        $levelRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $levelRepository->expects(self::once())->method('add')->with($level);
        $this->inject($this->subject, 'levelRepository', $levelRepository);

        $this->subject->createAction($level);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenLevelToView()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('level', $level);

        $this->subject->editAction($level);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenLevelInLevelRepository()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();

        $levelRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $levelRepository->expects(self::once())->method('update')->with($level);
        $this->inject($this->subject, 'levelRepository', $levelRepository);

        $this->subject->updateAction($level);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenLevelFromLevelRepository()
    {
        $level = new \LTH\LthQuiz\Domain\Model\Level();

        $levelRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $levelRepository->expects(self::once())->method('remove')->with($level);
        $this->inject($this->subject, 'levelRepository', $levelRepository);

        $this->subject->deleteAction($level);
    }
}
