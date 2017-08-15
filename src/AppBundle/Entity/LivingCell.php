<?php

namespace AppBundle\Entity;

/**
 * Class LivingCell
 * @package AppBundle\Entity
 */
class LivingCell implements CellInterface
{
    /** @var  bool $alive */
    /** @var  integer $posX */
    /** @var  integer $posY */
    private $alive;
    private $posX;
    private $posY;

    /**
     * @return bool
     */
    public function isAlive() :bool
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
     * @return mixed
     */
    public function getPosX() :int
    {
        return $this->posX;
    }

    /**
     * @param mixed $posX
     */
    public function setPosX(int $posX)
    {
        $this->posX = $posX;
    }

    /**
     * @return mixed
     */
    public function getPosY() :int
    {
        return $this->posY;
    }

    /**
     * @param mixed $posY
     */
    public function setPosY(int $posY)
    {
        $this->posY = $posY;
    }
}