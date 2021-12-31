<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
	public function apiResponse($resultType, $data, $dataValue, $message = null, $code = 200): JsonResponse
	{
		$response = [];
		$response['success'] = $resultType == ResultTypeController::Success;

		if (isset($data)){
			if ($resultType != ResultTypeController::Error){
				$response[$dataValue] = $data;
			}

			if ($resultType == ResultTypeController::Error){
				$response['errors'] = $data;
			}
		}

		if (isset($message)){
			$response['message'] = $message;
		}

		return response()->json($response, $code);
	}
}
