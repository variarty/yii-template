<?php

use app\widgets\alert\AlertType;

return [
    'wrongAuthData' => [
        'category' => 'app/error',
        'text' => 'Wrong login or password.',
        'type' => AlertType::ERROR,
    ],

    'passwordResetRequestEmailNotFound' => [
        'category' => 'app/error',
        'text' => 'User not found.',
        'type' => AlertType::ERROR,
    ],

    'passwordResetSuccess' => [
        'category' => 'app/msg',
        'text' => 'Password reset successfully.',
        'type' => AlertType::SUCCESS,
    ],

    'passwordResetRequestSuccess' => [
        'category' => 'app/msg',
        'text' => 'Instructions for password recovery sent to you by email.',
        'type' => AlertType::SUCCESS,
    ],
];
