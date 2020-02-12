<?php

use \App\App;

require '../../../bootloader.php';



// Check user authorization
if (!App::$session->userLoggedIn()) {
    $response = new \Core\Api\Response();
    $response->addError('You are not authorized!');
    $response->print();
}

// Filter received data
$form = (new \App\Goods\Views\ApiForm())->getData();
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
function form_success($filtered_input, &$form) {


    $response = new \Core\Api\Response();
    $model = new \App\Goods\Model();

    $models = [
        'good' => new \App\Goods\Model(),
        'user' => new \App\Users\Model(),
    ];

    $conditions = [
        'row_id' => intval($_POST['id'])
    ];

    //gauname areju su $drink objektais (siuo atveju viena objekta arejuje pagal paduota id
    $goods = $model->get($conditions);
    if (!$goods) {
        $response->addError('Participant doesn`t exist!');
    } else {
        $good = $goods[0];

        //idedame i data holderi naujas vertes, kurias ivede useris
        //ir kurios atejo is javascripto
        $good->setName($filtered_input['name']);
        $good->setImage($filtered_input['image']);
        $good->setPrice($filtered_input['price']);
        $good->setDiscount($filtered_input['discount']);
        $good->setInStock($filtered_input['in_stock']);

//        $reviews->setSurname($filtered_input['surname']);
//        $reviews->setSize($filtered_input['size']);
//        $reviews->setHeight($filtered_input['height']);
//        $reviews->setColor($filtered_input['color']);

        //vertes, kurias idejome auksciau i data holderi updatinam
        //ir duombazeje FileDB ka daro $drinksModel->update($drink) metodas
        $model->update($good);

        // Irasom visa dalyvio informacija i response
        $good_array = $good->getData();
//        $good_array['date'] = to_time_ago($good_array['date']);
//        $user = $models['user']-> getById($good_array['userid']);
//        $good_array['full_name'] = $user->getName() . ' ' . $user->getLastName();
//        unset($good_array['userid']);
        $response->setData($good_array);

    }

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
function form_fail($filtered_input, &$form) {
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }

    $response->print();
}