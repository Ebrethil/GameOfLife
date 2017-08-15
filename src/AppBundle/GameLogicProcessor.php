<?php


namespace AppBundle;

/**
 * Class GameLogicProcessor
 * @package AppBundle
 */
class GameLogicProcessor
{
    private $nextCycleGenerator;
    private $gameRuleExecuter;
    /**
     * @var GameRuleExecutor
     */
    private $gameRuleExecutor;

    /**
     * GameLogicProcessor constructor.
     * @param NextCycleGenerator $nextCycleGenerator
     * @param GameRuleExecutor $gameRuleExecutor
     */
    public function __construct(NextCycleGenerator $nextCycleGenerator, GameRuleExecutor $gameRuleExecutor)
    {
        $this->nextCycleGenerator = $nextCycleGenerator;
        $this->gameRuleExecutor = $gameRuleExecutor;
    }


    public function proceess()
    {
        $livingCells = $this->getLivingCellsFromJson();
        $temporaryCalculationCells = $this->nextCycleGenerator->generate($livingCells);
        foreach ($temporaryCalculationCells as $cell) {
            $this->gameRuleExecutor->applyRules($cell); //TODO: return bool if cell will stay alive
            //TODO: add to new lifeCellArr
        }
    }
}