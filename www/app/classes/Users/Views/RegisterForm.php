<?php

namespace App\Users\Views;

class RegisterForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'register-form',
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_no_space',
                        ]
                    ],
                ],
                'lastname' => [
                    'label' => 'Last name',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_no_space',
                        ]
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_mail'
                        ]
                    ],
                ],
                'phone' => [
                    'label' => 'Phone',
                    'type' => 'phone',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_number'
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Password repeat',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Registruotis',
                ],
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
