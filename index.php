<?php

    require('vendor/autoload.php');

    use Novu\SDK\Novu;
 
    $apiKey = '1445c955e0badd3bc0f56066b6cc61d5';
    $novu = new Novu($apiKey);

    // Create subscriber
    $novu->createSubscriber([
        'subscriberId' => '7789',
        'email' => 'abc@gmail.com', // optional
        'firstName' => 'John', // optional
        'lastName' => 'Doe', // optional
    ])->toArray();

    // Update subscriber
    $subscriberId = '7789';
    $novu->updateSubscriber($subscriberId, [
        'email' => 'validemail@gmail.com',  // replace with valid email
        'firstName' => 'Janet', // optional
        'lastName' => 'Fisherman', // optional
    ])->toArray();

    $response = $novu->triggerEvent([
        'name' => 'first-email',
        'payload' => ['first-name' => 'Adam'],
        'to' => [
            'subscriberId' => '7789'
        ]
    ])->toArray();

    print_r($response);

    