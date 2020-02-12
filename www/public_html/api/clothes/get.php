<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$model = new App\Clothes\Model();

$conditions = $_POST ?? [];

$clothing = $model->get($conditions);
if ($clothing !== false) {
    foreach ($clothing as $person) {
        $response->addData($person->getData());
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();