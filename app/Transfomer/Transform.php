<?php

namespace App\Transfomer;

use Illuminate\Http\Request;

/**
 * 
 */
trait Transform
{
    public function mainResponse($message, $data, $statusCode, $isSuccess = true)
    {
            if (!$message)
            {
                return response()->json
                ([
                   'message' => 'Message is required'
                ], 500);
            }

        if ($isSuccess)
        {
            return response()->json
                ([
                    'post' => $data,
                    'message' => $message,
                    'error' => false,
                    'code' => $statusCode,
                ], $statusCode);

        }else
        {
            return response()->json
                ([
                    'message' => $message,
                    'error' => true,
                    'code' => $statusCode,
                ], $statusCode);
        }
    }


    public function success($message, $data, $statusCode = 200)
    {
        return $this->mainResponse($message, $data, $statusCode);
    }

    public function error($message, $statusCode = 500)
    {
        return $this->MainResponse($message, null, $statusCode, false);
    }
}
