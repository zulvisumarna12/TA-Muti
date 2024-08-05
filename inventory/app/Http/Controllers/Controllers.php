<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseControllers;

class Controllers extends BaseControllers
{
    use AuthorizesRequests, ValidatesRequests;
}
