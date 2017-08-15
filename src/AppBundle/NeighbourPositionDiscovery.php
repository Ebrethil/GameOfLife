<?php


namespace AppBundle;

use AppBundle\Entity\GameState;
use AppBundle\Entity\LivingCell;
use AppBundle\Entity\TemporaryCalculationCell;

/**
 * Class NeighbourPositionDiscovery
 * @package AppBundle
 */
class NeighbourPositionDiscovery
{
    /** @var array  */
    private $neighbourVectorPath = [       //TODO: Move into separate class and make it configurable through config.yml
        'Left1' => [
            'vectorX' => -1,
            'vectorY' => 0,
            'count' => 1,
        ],
        'Up1' => [
            'vectorX' => 0,
            'vectorY' => 1,
            'count' => 1,
        ],
        'Right2' => [
            'vectorX' => 1,
            'vectorY' => 0,
            'count' => 2,
        ],
        'Down2' => [
            'vectorX' => 0,
            'vectorY' => -1,
            'count' => 2,
        ],
        'Left2' => [
            'vectorX' => -1,
            'vectorY' => 0,
            'count' => 2,
        ],
    ];


    /**
     * @param LivingCell $livingCell
     * @return array
     */
    public function discover(LivingCell $livingCell)
    {
        $neighboursPositions = [];
        $centerPosX = $livingCell->getPosX();
        $centerPosY = $livingCell->getPosY();
        $lastPosX = $centerPosX;
        $lastPosY = $centerPosY;

        foreach ($this->neighbourVectorPath as $nextDirection) {
            $vectorCount = $nextDirection['count'];

            while ($vectorCount > 0) {
                $neighbourPosX = $lastPosX + $nextDirection['vectorX'];
                $neighbourPosY = $lastPosY + $nextDirection['vectorY'];

                $neighboursPositions[] = [
                    'posX' => $neighbourPosX,
                    'posY' => $neighbourPosY,
                ];

                $lastPosX = $neighbourPosX;
                $lastPosY = $neighbourPosY;
                $vectorCount --;
            }
        }

        return $neighboursPositions;
    }
}