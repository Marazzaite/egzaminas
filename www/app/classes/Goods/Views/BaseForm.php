<?php

namespace App\Goods\Views;

class BaseForm extends \Core\Views\Form
{

    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Prekes pavadinimas',
                    'type' => 'text',
                ],
                'price' => [
                    'label' => 'Kaina',
                    'type' => 'number',
                    'extra' => [
                        'attr' => [
                            'step' => '0.01'
                        ]
                    ]
                ],
                'image' => [
                    'label' => 'Image (Url)',
                    'type' => 'text',
                ],
                'in_stock' => [
                    'label' => 'Kiekis Sandelyje',
                    'type' => 'number',
                ],
                'discount' => [
                    'label' => 'Nuolaida %',
                    'type' => 'number',
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
