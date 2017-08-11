<?php

namespace php\Builder;

use php\Collection\BeverageCollection;
use php\Data\DataReader;
use php\Entity\Beverage;
use DateTime;

class BeverageCollectionBuilder {

    /**
     * @param string $file
     *
     * @return BeverageCollection
     */
    public function build(string $file)
    {
        $beverageCollection = new BeverageCollection();
        $dataReader = new DataReader();
        $beveragesData = $dataReader->read($file);

        foreach ($beveragesData as $beverageData) {
            $beverage = new Beverage(
                $beverageData['id'],
                $beverageData['beverage'],
                $beverageData['volume'],
                $beverageData['price'],
                $beverageData['percentage'],
                new DateTime($beverageData['updatedPriceDate']),
                $beverageData['typeOfBeverage']
            );

            $beverageCollection->add($beverage);
        }

        return $beverageCollection;
    }
}