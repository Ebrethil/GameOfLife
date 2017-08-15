<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Board;
use AppBundle\Entity\Cell;
use AppBundle\NeighbourPositionDiscovery;

/**
 * Class GameRuleExecuter
 * @package AppBundle\Controller
 */
class GameRuleExecuter
{
    private $neighbourPositionDiscovery;

    /**
     * GameRuleExecuter constructor.
     * @param $neighbourPositionDiscovery
     */
    public function __construct(NeighbourPositionDiscovery $neighbourPositionDiscovery)
    {
        $this->neighbourPositionDiscovery = $neighbourPositionDiscovery;
    }


    public function calculateLivingStatus(Cell $cell, Board $board)
    {
        $livingNeighbourCount = $this->getLivingNeighbourCount($cell, $board);
        if ($livingNeighbourCount === 3 || $livingNeighbourCount === 4 && $cell->isAlive()) {
            $cell->setWillLive(true);
        } elseif ($livingNeighbourCount === 3) {
            $cell->setWillLive(true);
        }
    }


    private function getLivingNeighbourCount(Cell $cell, Board $board)
    {
        $neighbours = $this->neighbourPositionDiscovery->discover($cell, $board);
        $livingNeighbourCount = 0;
        foreach ($neighbours as $neighbourPos) {
            $neighbourCell = $board->getCellByPosition($neighbourPos);
            if ($neighbourCell->isAlive()) {
                $livingNeighbourCount ++;
            }
        }

        return $livingNeighbourCount;
    }
}