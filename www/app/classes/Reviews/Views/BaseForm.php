<?php

namespace App\Reviews\Views;

class BaseForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'review' => [
                    'label' => 'Atsiliepimas',
                    'type' => 'text',
                ],
                'ranking' => [
                    'label' => 'Įvertinimas',
                    'type' => 'text',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ],
            ]
        ];
    }

}
