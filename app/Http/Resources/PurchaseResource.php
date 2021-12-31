<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
			'receipt' => $this->receipt,
			'status' => $this->status,
			'expire_date' => $this->language,
			'uid' => $this->operating_system,
		];
    }
}
