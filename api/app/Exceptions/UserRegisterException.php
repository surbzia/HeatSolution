<?php

namespace App\Exceptions;

use App\Http\Resources\Public\FrontResource;
use Exception;

class UserRegisterException extends Exception
{
    public $error;
    public function __construct($error)
    {
        $this->error = $error;
    }
    public function render($request)
    {
        return new FrontResource(['success' => false, 'data' => $this->error]);
    }
}
