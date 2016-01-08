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
                'to'      => 'casey@bullshit.systems',
                'sender'  => 'info@my-domain.tld',
                'subject' => 'New message from the contact form'
            ]
        ]
    ]);

    return compact('form');
};