<?php

namespace php\Interfaces;

use php\Entity\Beverage;

interface BeverageCollectionInterface
{
    public function add(Beverage $beverage);

    /**
     * @param array $beverages
     */
    public function addBeverages(array $beverages);

    /**
     * @param int $id
     *
     * @return Beverage|null
     */
    public function findById($id);

    /**
     * @return array
     */
    public function getCollection();
}