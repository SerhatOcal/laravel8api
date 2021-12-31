<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        	'id' => $this->uid,
        	'appId' => $this->appId,
			'language' => $this->language,
			'operating_system' => $this->operating_system,
			'token'	=> $this->token
		];
    }
}
