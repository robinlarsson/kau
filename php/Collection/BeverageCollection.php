<?php

namespace php\Collection;

use php\Entity\Beverage;
use php\Interfaces\BeverageCollectionInterface;
use IteratorAggregate;
use Countable;
use JsonSerializable;

class BeverageCollection implements IteratorAggregate, JsonSerializable, Countable, BeverageCollectionInterface
{
    /** @var Beverage[] */
    private $collection;

    public function __construct()
    {
        $this->collection = [];
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * @param Beverage $beverage
     */
    public function add(Beverage $beverage)
    {
        $this->collection[] = $beverage;
    }

    /**
     * @param Beverage[] $beverages
     */
    public function addBeverages(array $beverages)
    {
        foreach ($beverages as $beverage) {
            $this->add($beverage);
        }
    }

    /**
     * @param int $id
     *
     * @return Beverage|null
     */
    public function findById($id)
    {
        foreach ($this->collection as $beverage) {
            if ($beverage->getId() === $id) {
                return $beverage;
            }
        }

        return null;
    }

    /**
     * @return Beverage[]
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];

        foreach ($this->getCollection() as $beverage) {
            $data[] = $beverage->toArray();
        }

        return $data;
    }

    /**
     * @return string
     */
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return array|Beverage[]
     */
    public function getIterator()
    {
        return $this->collection;
    }
}