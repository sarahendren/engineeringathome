<?php

return function($site, $pages, $page) {
    $form = uniform('contact-form', [
        'required' => [
            'name'  => '',
            '_from' => 'email'
        ],
        'actions' => [
            [
                '_action' => 'email',
                'to'      => 'engineeringathome@gmail.com',
                'sender'  => 'engineeringathome@gmail.com',
                'subject' => '[engineeringathome] New message from {name}'
            ]
        ]
    ]);

    return compact('form');
};