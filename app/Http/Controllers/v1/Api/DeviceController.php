<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Resources\DeviceResource;
use App\Models\Device;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DeviceController extends ApiController
{
	public function index(){
		return DeviceResource::collection(Cache::remember("device", 60*60, function (){
			return $this->apiResponse(ResultTypeController::Success, Device::all(),'Error', 'Redis', Response::HTTP_OK);
		}));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param $request
	 * @return JsonResponse|Response
	 */
    public function store(Request $request)
	{
		$validator =  Validator::make($request->all(),[
			'uid' 				=> 'required|string',
			'appId' 			=> 'required|string',
			'language' 			=> 'required|string',
			'operating_system' 	=> 'required|string'
		]);

		if($validator->fails()){
			return $this->apiResponse(ResultTypeController::Error, $validator->getMessageBag(),'Error', 'Yanlış istek', Response::HTTP_BAD_REQUEST);
		}

		try {
			$device = Device::where('uid', $request->uid)->firstOrFail();
			return $this->apiResponse(ResultTypeController::Success, $device->token,'client_token', 'kayıt getirildi', Response::HTTP_OK);
		} catch (\Exception $exception){

			$token = hash('sha256', Str::random(40));
			$device = Device::create([
				"uid" 				=> $request->uid,
				"appId" 			=> $request->appId,
				"language" 			=> $request->language,
				"operating_system" 	=> $request->operating_system,
				"token"				=> $token
			]);

			if ($device){
				return $this->apiResponse(ResultTypeController::Success, $device->token,'client_token', 'Kayıt Eklendi', Response::HTTP_CREATED);
			}

			return $this->apiResponse(ResultTypeController::Error, $exception->getMessage(),'error', 'Kayıt bulunamadı', Response::HTTP_NOT_FOUND);
		}
    }
}
