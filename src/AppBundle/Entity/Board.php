<?php


namespace AppBundle\Entity;

use AppBundle\NeighbourPositionDiscovery;

/**
 * Class Board
 * @package AppBundle\Entity
 */
class Board
{
    public $cells = [];

    /**
     * Board constructor.
     * @param int $boardLength
     * @param int $boardWidth
     */
    public function __construct(int $boardLength, int $boardWidth)
    {
        $this->initalizeBoard($boardLength, $boardWidth);
    }

    /**
     * @param int $boardLength
     * @param int $boardWidth
     */
    private function initalizeBoard(int $boardLength, int $boardWidth) :void
    {
        $posX = 1;
        while ($boardLength > $posX) {
            $posY = 1;
            while ($boardWidth > $posY) {
                $this->createAndAddCellToBoard($posX, $posY);
                $posY ++;
            }
            $posX ++;
        }
    }

    /**
     * @param string $posKey
     * @return Cell
     */
    public function getCellByPosition(string $posKey) :Cell
    {
        return $this->cells[$posKey];
    }

    /**
     * @param int $posX
     * @param int $posY
     */
    private function createAndAddCellToBoard(int $posX, int $posY) :void
    {
        /** @var Cell $cell */
        $cell = new Cell($posX, $posY);
        $cells["$posX/$posY"] = $cell;
    }
}



