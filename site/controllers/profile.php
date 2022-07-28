<?php

    return function ($kirby) {

    $error = false;

    // handle the form submission
    if ($kirby->request()->is('POST') && get('login')) {

        // try to log the user in with the provided credentials
        try {
        $kirby->auth()->login(get('email'), get('password'));

        // redirect to the homepage if the login was successful
        go('/home/profil');
        } catch (Exception $e) {
        $error = true;
        }

    }

    return [
        'error' => $error
    ];

    };
?>