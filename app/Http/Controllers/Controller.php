<?php

namespace App\Http\Controllers;

use App\Traits\JsonExceptionHandlerTrait;
use App\Traits\JsonResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    use JsonResponseTrait;
    use JsonExceptionHandlerTrait;
}
