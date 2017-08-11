<?php

namespace php\Entity;

use DateTime;

class Beverage
{
    /** @var int */
    private $id;

    /** @var string */
    private $beverage;

    /** @var int */
    private $volume;

    /** @var int */
    private $price;

    /** @var double */
    private $percentage;

    /** @var DateTime */
    private $updatedPriceDate;

    /** @var string */
    private $typeOfBeverage;

    public function __construct(
        int $id,
        string $beverage,
        int $volume,
        int $price,
        string $percentage,
        DateTime $updatedPriceDate,
        string $typeOfBeverage
    ) {
        $this->id = $id;
        $this->beverage = $beverage;
        $this->volume = $volume;
        $this->price = $price;
        $this->percentage = $percentage;
        $this->updatedPriceDate = $updatedPriceDate;
        $this->typeOfBeverage = $typeOfBeverage;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @return string
     */
    public function getBeverage()
    {
        return $this->beverage;
    }

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedPriceDate()
    {
        return $this->updatedPriceDate;
    }

    /**
     * @return string
     */
    public function getTypeOfBeverage()
    {
        return $this->typeOfBeverage;
    }

    /**
     * @return string
     */
    public function getAPK()
    {
        $apk = ($this->getVolume() * ($this->getPercentage()/10))/$this->getPrice();

        return number_format($apk, 2, ',', '.');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'beverage' => $this->getBeverage(),
            'volume' => $this->getVolume(),
            'price' => $this->getPrice(),
            'percentage' => $this->getPercentage(),
            'apk' => $this->getAPK(),
            'updatedPriceDate' => $this->getUpdatedPriceDate(),
            'typeOfBeverage' => $this->getTypeOfBeverage(),
        ];
    }
}