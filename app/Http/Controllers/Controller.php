<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse(object $data = null, int $code = 200){
        return response()->json([
            'success' => true,
            'data' => $data
        ], $code);
    }

    public function errorResponse(string $message, int $code = 500){
        return response()->json([
            'error' => $message
        ], $code);
    }
}
