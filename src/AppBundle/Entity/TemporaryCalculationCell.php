<?php


namespace AppBundle\Entity;

/**
 * Class TemporaryCalculationCell
 * @package AppBundle\Entity
 */
class TemporaryCalculationCell implements CellInterface
{
    /** @var int  */
    private $posX;
    /** @var int  */
    private $posY;
    /** @var bool  */
    private $alive;
    /** @var int  */
    private $livingNeighbourCount = 1;

    /**
     * TemporaryCalculationCell constructor.
     * @param int $posX
     * @param int $posY
     */
    public function __construct($posX, $posY, ?bool $wasAlive = false)
    {
        $this->posX = $posX;
        $this->posY = $posY;
    }


    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->alive;
    }

    /**
     * @param bool $alive
     * @return void
     */
    public function toggleAlive($alive)
    {
        $this->alive = $alive;
    }

    /**
     * @return int
     */
    public function getPosX(): int
    {
        return $this->posX;
    }

    /**
     * @param int $posX
     * @return void
     */
    public function setPosX(int $posX)
    {
        $this->posX = $posX;
    }

    /**
     * @return int
     */
    public function getPosY(): int
    {
        return $this->posY;
    }

    /**
     * @param int $posY
     * @return void
     */
    public function setPosY(int $posY)
    {
        $this->posY = $posY;
    }

    /**
     * @return int
     */
    public function getLivingNeighbourCount(): int
    {
        return $this->livingNeighbourCount;
    }

    public function incrementLivingNeighbourCount()
    {
        $this->livingNeighbourCount ++;
    }
}