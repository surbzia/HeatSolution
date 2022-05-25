<?php

namespace App\Exceptions;

use App\Http\Resources\Public\FrontResource;
use Exception;

class CustomeFrontendException extends Exception
{
    public function render($request)
    {
        return new FrontResource(['success' => false, 'data' => 'Not Found']);
    }
}
