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
                'to'      => 'unlikely.engineering@gmail.com',
                'sender'  => 'unlikely.engineering@gmail.com',
                'subject' => '[unlikelyengineering] New message from {name}'
            ]
        ]
    ]);

    return compact('form');
};