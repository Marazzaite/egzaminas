<?php

use App\App;

require '../../../bootloader.php';

// Check user authorization
if (!App::$session->userLoggedIn()) {
    $response = new \Core\Api\Response();
    $response->addError('You are not authorized!');
    $response->print();
}

// Filter received data
$form = (new \App\Reviews\Views\ApiForm())->getData();
$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);

/**
 * If request passes validation
 * this function is automatically
 * called
 *
 * @param type $filtered_input
 * @param type $form
 */
function form_success($filtered_input, $form)
{
    $response = new \Core\Api\Response();
    $review = new \App\Reviews\Reviews();
    $models = [
        'review' => new \App\Reviews\Model(),
        'user' => new \App\Users\Model(),
    ];

    $review->setDate(time());
    $review->setReview($filtered_input['review']);
//    $review->setUserName(\App\App::$session->getUser()->getName());
    $review->setUserId(\App\App::$session->getUser()->getId());
    $review->setRanking($filtered_input['ranking']);

    $id = $models['review']->insert($review);
    $review->setId($id);


//
//    $user = \App\App::$session->getUser();
//    $review->setUserId($user->getId());
//    $model->insert($review);
    $review_array = $review->getData();
    $review_array['date'] = to_time_ago($review_array['date']);


    $user = $models['user']-> getById($review_array['userid']);

    $review_array['full_name'] = $user->getName() . ' ' . $user->getLastName();
    unset($review_array ['userid']);

    $response->setData($review_array);
    $response->print();

}

/**
 * If request fails validation
 * this function is automatically
 * called
 *
 * @param type $filtered_input
 * @param type $form
 */
function form_fail($filtered_input, $form) {
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }

    $response->print();
}
