<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\View\View;
use RuntimeException;

class ResponseException extends RuntimeException
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * @return Response|View
     */
    public function getResponse()
    {
        return $this->response;
    }
}
