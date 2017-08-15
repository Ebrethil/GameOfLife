<?php

namespace AppBundle;

use AppBundle\Entity\GameState;
use AppBundle\Entity\LivingCell;
use AppBundle\Entity\TemporaryCalculationCell;

/**
 * Class TemporaryCalculationCellManager
 * @package AppBundle
 */
class TemporaryCalculationCellManager
{
    private $temporaryCalculationCell;
    private $gameState;

    /**
     * TemporaryCalculationCellManager constructor.
     * @param TemporaryCalculationCell $temporaryCalculationCell
     * @param GameState $gameState
     */
    public function __construct(TemporaryCalculationCell $temporaryCalculationCell, GameState $gameState)
    {
        $this->temporaryCalculationCell = $temporaryCalculationCell;
        $this->gameState = $gameState; //TODO: gameState is stateful and must be transferred as a parameter instead of getting injected!
    }

    /**
     * @param array $coords
     * @param $wasAlive
     */
    public function manage(array $coords, ?bool $wasAlive = false)
    {
        $tempCalcCells = $this->gameState->getTemporaryCalculationCells();
        $key = $this->combineCoordsToKey($coords);

        if (array_key_exists($key, $tempCalcCells)) {
            $this->updateTempCalcCell($key);
        } else {
            $this->generateNewTempCalcCell($coords, $key, $wasAlive);
        }
    }


    /**
     * @param array $coords
     * @param string $key
     * @param bool|null $wasAlive
     */
    private function generateNewTempCalcCell(array $coords, string $key, bool $wasAlive)
    {
        $cell = new TemporaryCalculationCell($coords['posX'], $coords['posY'], $wasAlive);
        $this->gameState->addCellToTemporaryCalculationCells($cell, $key);
    }

    /**
     * @param string $key
     */
    private function updateTempCalcCell(string $key)
    {
        $tempCalcCells = $this->gameState->getTemporaryCalculationCells();
        /** @var TemporaryCalculationCell $tempCalcCell */
        $tempCalcCell  = $tempCalcCells[$key]; //ArrayPush in correct order??
        $tempCalcCell->incrementLivingNeighbourCount();
    }

    /**
     * @param array $coords
     * @return string
     */
    private function combineCoordsToKey(array $coords) :string
    {
        return "$coords[posX] ./. $coords[posY]";
    }
}