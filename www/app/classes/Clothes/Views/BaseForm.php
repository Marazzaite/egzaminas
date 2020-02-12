<?php

namespace App\Clothes\Views;

class BaseForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                ],
                'surname' => [
                    'label' => 'Pavardė',
                    'type' => 'text',
                ],
                'size' => [
                    'label' => 'Dydis',
                    'type' => 'text',
                ],
                'height' => [
                    'label' => 'Ūgis',
                    'type' => 'text',
                ],
                'color' => [
                    'label' => 'Spalva',
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
