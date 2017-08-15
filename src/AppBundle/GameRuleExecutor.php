<?php


namespace AppBundle;
use AppBundle\Entity\GameState;
use AppBundle\Entity\TemporaryCalculationCell;

/**
 * Class GameRuleExecutor
 * @package AppBundle
 */
class GameRuleExecutor
{
    /**
     * 1th Rule: $wasAlive = TRUE  && $livingNeighbourCount < 2    --> isAlive = FALSE
     * 2nd Rule: $wasAlive = TRUE  && $livingNeighbourCount = 2, 3 --> isAlive = TRUE     && WAS ALIVE!!!
     * 3rd Rule: $wasAlive = TRUE  && $livingNeighbourCount > 3    --> isAlive = FALSE
     * 4th Rule: $wasAlive = FALSE && $livingNeighbourCount = 3    --> isAlive = TRUE
     */

    /**
     * @param TemporaryCalculationCell $cell
     */
    public function applyRules(TemporaryCalculationCell $cell)
    {
        $neighbours = $cell->getLivingNeighbourCount();
        $cellIsAlive = $cell->isAlive();
        if ($cellIsAlive && 2 <= $neighbours && $neighbours >= 3) {
            $this->addToNextGenLivingCells($cell);
        } elseif (!$cellIsAlive && $neighbours === 3) {
            $this->addToNextGenLivingCells($cell);
        } else {
            return;
        }
    }

    private function addToNextGenLivingCells(TemporaryCalculationCell $cell)
    {
        //TODO: add $cell to to $nextGenLivingCells[] of gameState
    }
}