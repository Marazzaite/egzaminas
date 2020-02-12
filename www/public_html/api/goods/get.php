<?php
use App\Goods\Model;

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$models = [
    'good' => new \App\Goods\Model(),
];

$conditions = $_POST ?? [];
$goods = $models['good']->get($conditions);

if ($goods !== false) {
    foreach ($goods as $good) {
        $good_array = $good->getData();
        $response->addData($good_array);
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();