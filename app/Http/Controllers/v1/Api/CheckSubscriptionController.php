<?php

namespace App\Http\Controllers\v1\Api;

use App\Models\Device;
use App\Models\Purchase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckSubscriptionController extends ApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
	 */
    public function store(Request $request): JsonResponse
	{
		try {
			$device = Device::where('token', $request->client_token)->firstOrFail();
			$purchase = Purchase::where('uid', $device->uid)->get();
			return $this->apiResponse(ResultTypeController::Success, $purchase,'purchase', 'kayıt getirildi', Response::HTTP_OK);
		} catch (\Exception $exception){
			return $this->apiResponse(ResultTypeController::Error, $exception->getMessage(),'Error', 'kayıt bulunamadı', Response::HTTP_NOT_FOUND);
		}
	}

}
