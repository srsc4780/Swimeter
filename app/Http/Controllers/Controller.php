<?php

namespace App\Http\Controllers;

use App\Exceptions\ResponseException;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->constructTraits();
    }

    protected function constructTraits()
    {
        $constructed = [];

        foreach (class_uses_recursive($this) as $trait) {
            $method = 'construct' . class_basename($trait);

            if (method_exists($this, $method) && ! in_array($method, $constructed)) {
                call_user_func([$this, $method]);

                $constructed[] = $method;
            }
        }
    }

    /**
     * @var User
     */
    protected $visitor = null;

    final public function callAction($method, $parameters)
    {
        if (auth()->check()) {
            $this->visitor = auth()->user();
        }

        try {
            $this->preDispatch($method, $parameters);
            $response = parent::callAction($method, $parameters);
        } catch (ResponseException $e) {
            $response = $e->getResponse();
        }

        $this->postDispatch($method, $response);

        return $response;
    }

    protected function preDispatch($method, &$parameters) { }

    protected function postDispatch($method, &$response) { }
}
