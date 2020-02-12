<?php
use App\Participants\Model;
require '../../../bootloader.php';

$response = new \Core\Api\Response();
$review = new \App\Reviews\Reviews();
$models = [
    'review' => new \App\Reviews\Model(),
    'user' => new \App\Users\Model(),
];

$conditions = $_POST ?? [];
$reviews = $models['review']->get($conditions);
if ($reviews !== false) {
    foreach ($reviews as $review) {
        $review_array = $review->getData();
        $review_array['date'] =  to_time_ago($review_array['date']);
        $user = $models['user']-> getById($review_array['userid']);
        $review_array['full_name'] = $user->getName() . ' ' . $user->getLastName();
        unset($review_array['userid']);
        $response->addData($review_array);

    }


} else {
    $response->addError('Could not pull data from database!');
}

$response->print();