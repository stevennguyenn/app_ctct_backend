<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseControllerPlus extends Controller
{
    public function sendResponse($result, $message) {
        $response = [
            'code' => 200,
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessage = [], $code = 200) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
