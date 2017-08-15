<?php


namespace AppBundle\Entity;

/**
 * Class Cell
 * @package AppBundle\Entity
 */
class Cell
{
    /** @var  int $posX */
    private $posX;
    /** @var  int $posY */
    private $posY;
    /** @var  bool $alive */
    private $alive = false;
    /** @var  bool $willLive */
    private $willLive = false;

    /**
     * Cell constructor.
     * @param int $posX
     * @param int $posY
     */
    public function __construct(int $posX, int $posY)
    {
        $this->posX = $posX;
        $this->posY = $posY;
    }


    /**
     * @return bool
     */
    public function getPosX(): bool
    {
        return $this->posX;
    }

    /**
     * @param bool $posX
     */
    public function setPosX(bool $posX)
    {
        $this->posX = $posX;
    }

    /**
     * @return mixed
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * @param mixed $posY
     */
    public function setPosY($posY)
    {
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
     */
    public function setAlive(bool $alive)
    {
        $this->alive = $alive;
    }

    /**
     * @return bool
     */
    public function willLive(): bool
    {
        return $this->willLive;
    }

    /**
     * @param bool $willLive
     */
    public function setWillLive(bool $willLive)
    {
        $this->willLive = $willLive;
    }
}
