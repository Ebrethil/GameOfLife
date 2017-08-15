<?php

namespace AppBundle\Collection;

use AppBundle\Entity\CellInterface;

/**
 * Interface CellCollectionInterface
 */
interface CellCollectionInterface
{
    public function getCollection();

    public function addCellToCollection(CellInterface $cell, string $key);

}