<?php


namespace AppBundle\Entity;

/**
 * Interface CellInterface
 * @package AppBundle\Entity
 */
interface CellInterface
{
    /**
     * @return bool
     */
    public function isAlive() :bool;

    /**
     * @param bool $alive
     * @return void
     */
    public function toggleAlive($alive);

    /**
     * @return int
     */
    public function getPosX() :int;

    /**
     * @param int $posX
     * @return void
     */
    public function setPosX(int $posX);

    /**
     * @return int
     */
    public function getPosY() :int;

    /**
     * @param int $posY
     * @return void
     */
    public function setPosY(int $posY);


}