<?php


namespace AppBundle;

use AppBundle\Entity\GameState;
use AppBundle\Entity\LivingCell;

/**
 * Class NextCycleGenerator
 * @package AppBundle
 */
class NextCycleGenerator
{
    private $neighbourDiscovery;
    private $gameState; //TODO: gameState is stateful and must be transferred as a parameter instead of getting injected!
    private $temporaryCalculationCellManager;

    /**
     * NextCycleGenerator constructor.
     * @param NeighbourPositionDiscovery $neighbourDiscovery
     * @param GameState $gameState
     * @param TemporaryCalculationCellManager $temporaryCalculationCellManager
     */
    public function __construct(NeighbourPositionDiscovery $neighbourDiscovery, GameState $gameState, TemporaryCalculationCellManager $temporaryCalculationCellManager, LivingCell $livingCell)
    {
        $this->neighbourDiscovery = $neighbourDiscovery;
        $this->gameState = $gameState;
        $this->temporaryCalculationCellManager = $temporaryCalculationCellManager;
    }

    /**
     * @param array $livingCells
     */
    public function generate(array $livingCells)
    {

        //TODO: instead of using th $gameState get livingCells from JSON and hand TempCellArr down to the Manager
        //TODO: and return the full TempCellArr at the end to the GameLogicProcessor
        //$livingCells = $this->gameState->getLivingCells();

        $temporaryCells = [];

        foreach ($livingCells as $livingCell) {
            /** @var LivingCell $livingCell */
            /** @var array $neighboursCoordsOfCurrentCell */
            $neighboursCoordsOfCurrentCell = $this->neighbourDiscovery->discover($livingCell);

            $livingCellCoords = [
                'posX' => $livingCell->getPosX(),
                'posY' => $livingCell->getPosY(),
            ];

            $this->temporaryCalculationCellManager->manage($livingCellCoords, true);

            //TODO: choose better naming!
            foreach ($neighboursCoordsOfCurrentCell as $neighbourPosition) {
                //$this->temporaryCalculationCellManager->manage($neighbourCoords);

            }
        }
    }

    /**
     * @param array $coords
     * @param $wasAlive
     */
    private function manage(array $coords, ?bool $wasAlive = false)
    {
        $tempCalcCells = $this->gameState->getTemporaryCalculationCells();
        $key = $this->combineCoordsToKey($coords);

        if (array_key_exists($key, $tempCalcCells)) {
            $this->updateTempCalcCell($key);
        } else {
            $this->generateNewTempCalcCell($coords, $key, $wasAlive);
        }
    }

}
