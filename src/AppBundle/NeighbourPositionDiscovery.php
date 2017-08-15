<?php


namespace AppBundle;

use AppBundle\Entity\Board;

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
     * @param string $posKey
     * @param $board
     * @return array
     */
    public function discover(string $posKey, Board $board) :array
    {
        //TODO: Add gameBorder to neighbour calculation!
        $neighboursPositions = [];
        $coordinates = $this->getCoordinatesByKey($posKey);
        $lastPosX = $coordinates['posX'];
        $lastPosY = $coordinates['posY'];

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

    /**
     * @param string $posKey
     * @return array
     */
    private function getCoordinatesByKey(string $posKey) :array
    {
        $i = mb_strrpos($posKey, '/');
        $posX = mb_substr($posKey, 0, $i-1);
        $posY = mb_substr($posKey, $i);
        return [
            'posX' => $posX,
            'posY' => $posY,
        ];
    }

}