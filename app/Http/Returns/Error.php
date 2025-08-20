<?php

namespace App\Http\Returns;

class Error
{
    public static function execute(mixed $error, string $message = 'Error'):array {
        return [
            'status' => 'error',
            'message' => $message,
            'error' => $error,
        ];
    }
}