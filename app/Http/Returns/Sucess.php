<?php

namespace App\Http\Returns;

class Sucess
{
    public static function execute(string $message = 'Sucess', mixed $data = null ):array {
        return [
            'status' => 'sucess',
            'message' => $message,
            'error' => null,
            'data' => $data
        ];
    }
}