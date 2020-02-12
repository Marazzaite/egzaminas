<?php

namespace App\Goods\Views;

class ApiForm extends \Core\Views\Form
{
    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'price' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_number',
                        ],
                    ]
                ],
                'image' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ],
                    ]
                ],
                'in_stock' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_number',
                        ],
                    ]
                ],
                'discount' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_number',
                        ],
                    ]
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }


}

//    public function __construct($data = [])
//    {
//        $this->data = [
//            'fields' => [
//                'name' => [
//                    'label' => 'Pavadinimas',
//                    'type' => 'text',
////                    'value' => $good->getName(),
//                    // 'error' => 'Ivyko klaida',
//                    'extra' => [
//                        'validators' => [
//                            'validate_not_empty'
//                        ],
//                        'attr' => [
//                            'class' => 'first-name',
//                            'id' => 'first-name',
//                            'placeholder' => 'Pvz: Somersby'
//                        ]
//                    ]
//                ],
//                'amount' => [
//                    'label' => 'Kiekis(ml)',
//                    'type' => 'number',
////                    'value' => $good->getAmount(),
//                    'extra' => [
//                        'validators' => [
//                            'validate_not_empty',
//                            'validate_is_number',
//                        ],
//                        'attr' => [
//                            'class' => 'last-name',
//                            'id' => 'last-name',
//                            'placeholder' => 'Pvz: 500',
//                        ]
//                    ]
//                ],
////                'abarot' => [
////                    'label' => 'Abarot(%)',
////                    'type' => 'number',
////                    'value' => $good->getAbarot(),
////                    'extra' => [
////                        'validators' => [
////                            'validate_not_empty',
////                            'validate_is_number',
////                        ],
////                        'attr' => [
////                            'step' => '0.01',
////                            'class' => 'last-name',
////                            'id' => 'last-name',
////                            'placeholder' => 'Pvz: 4.4'
////                        ]
////                    ]
////                ],
//
//                'image' => [
//                    'label' => 'Nuotrauka(Url)',
//                    'type' => 'text',
////                    'value' => $good->getImage(),
//                    'extra' => [
//                        'validators' => [
//                            'validate_not_empty'
//                        ],
//                        'attr' => [
//                            'class' => 'last-name',
//                            'id' => 'last-name',
//                            'placeholder' => 'Pvz.: http://....'
//                        ]
//                    ]
//                ],
//                'price' => [
//                    'label' => 'Kaina',
//                    'type' => 'number',
////                    'value' => $good->getPrice(),
//                    'extra' => [
//                        'validators' => [
//                            'validate_not_empty',
//                            'validate_is_number',
//                        ],
//                        'attr' => [
//                            'step' => '0.01',
//                            'class' => 'last-name',
//                            'id' => 'last-name',
//                            'placeholder' => 'Pvz: 3.50'
//                        ]
//                    ]
//                ],
//                'in_stock' => [
//                    'label' => 'Atsargos sandėlyje',
//                    'type' => 'number',
////                    'value' => $good->getInStock(),
//                    'extra' => [
//                        'validators' => [
//                            'validate_not_empty',
//                            'validate_is_number',
//                        ],
//                        'attr' => [
//                            'class' => 'last-name',
//                            'id' => 'last-name',
//                            'placeholder' => 'Pvz: 13'
//                        ]
//                    ]
//                ],
//            ],
//
//            'buttons' => [
//
//                'create' => [
//                    'title' => 'Įkelti prekę',
//                    'extra' => [
//                        'attr' => [
//                            'class' => 'save-btn',
//                        ]
//                    ]
//                ]
//            ]
//        ];
//    }
//}