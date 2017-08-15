<?php


namespace AppBundle\Entity;

/**
 * Class GameState
 * @package AppBundle\Entity
 */
class GameState
{
    /** @var array  */
    private $livingCells = [];
    /** @var array  */
    private $temporaryCalculationCells = [];
    /** @var int  */
    private $cycleCount = 0;

    /**
     * @return array | LivingCell[]
     */
    public function getLivingCells() :array
    {
        return $this->livingCells;
    }

    /**
     * @param LivingCell|array $livingCells
     */
    public function addCellToLivingCells(LivingCell $livingCells)
    {
        $this->livingCells = $livingCells;
    }

    /**
     * @param TemporaryCalculationCell $temporaryCalculationCell
     * @param string $key
     */
    public function addCellToTemporaryCalculationCells(TemporaryCalculationCell $temporaryCalculationCell, string $key)
    {
        $this->temporaryCalculationCells[$key] = $temporaryCalculationCell;
    }

    /**
     * @return array
     */
    public function getTemporaryCalculationCells() :array
    {
        return $this->temporaryCalculationCells;
    }

    /**
     * @param TemporaryCalculationCell $temporaryCalculationCells
     */
    public function addCellToNextCycleCells(TemporaryCalculationCell $temporaryCalculationCells)
    {
        $this->temporaryCalculationCells[] = $temporaryCalculationCells;
    }

    /**
     * @return int
     */
    public function getCycleCount() :int
    {
        return $this->cycleCount;
    }

    /**
     * Function.
     */
    public function incrementCycleCount()
    {
        $this->cycleCount ++;
    }
}
