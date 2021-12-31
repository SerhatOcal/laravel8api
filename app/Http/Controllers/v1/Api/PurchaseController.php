<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Resources\PurchaseResource;
use App\Models\Device;
use App\Models\Purchase;
use App\Services\GoogleMockService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends ApiController
{
	public function index(){
		return PurchaseResource::collection(Cache::remember("device", 60*60, function (){
			return $this->apiResponse(ResultTypeController::Success, Purchase::all(),'Error', 'Redis', Response::HTTP_OK);
		}));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @param GoogleMockService $googleMockService
	 * @return JsonResponse
	 */
    public function store(Request $request, GoogleMockService $googleMockService): JsonResponse
	{
        $validator =  Validator::make($request->all(),[
        	'client_token'  => 'required|string',
        	'receipt' 		=> 'required|string',
		]);

        if($validator->fails()){
			return $this->apiResponse(ResultTypeController::Error, $validator->getMessageBag(),'Error', 'Yanlış istek', Response::HTTP_BAD_REQUEST);
		}

		try {

			$servicesData 	= $googleMockService->IsVerification($request->input('receipt'));
			$device 		= Device::where('token', $request->client_token)->first();
			$purchase = Purchase::create([
				'receipt' 		=> $request->input('receipt'),
				'status' 		=> $servicesData["OK"]["status"],
				'expire_date' 	=> $servicesData["OK"]["expire_date"],
				'uid'			=> $device->uid,
			]);

			return $this->apiResponse(ResultTypeController::Success, $purchase,'purchase', 'Kayıt getirildi', Response::HTTP_OK);

		} catch (\Exception $exception){
			return $this->apiResponse(ResultTypeController::Error, $exception->getMessage(),'Error', 'Hata', Response::HTTP_NOT_FOUND);
		}
	}
}
