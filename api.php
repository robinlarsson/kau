<?php

require_once 'php/Interfaces/BeverageCollectionInterface.php';
require_once 'php/Collection/BeverageCollection.php';
require_once 'php/Data/DataReader.php';
require_once 'php/Entity/Beverage.php';
require_once 'php/Builder/BeverageCollectionBuilder.php';

use php\Builder\BeverageCollectionBuilder;
use php\Entity\Beverage;

if (!empty($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    $id = (!empty($_REQUEST['id'])) ? (int) $_REQUEST['id'] : '';

    $builder = new BeverageCollectionBuilder();
    $collection = $builder->build("php/Data/beverages.csv");

    if ($action === 'list') {
        echo $collection->jsonSerialize();
    } elseif ($action === 'get') {
        $beverage = $collection->findById($id);

        if ($beverage instanceof Beverage) {
            echo json_encode(['status' => 'success', 'data' => $beverage->toArray()]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Beverage was not found']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Action not found']);
    }
} else {
    echo json_encode(['status' => 'error', 'msg' => 'Missing action parameter']);
}