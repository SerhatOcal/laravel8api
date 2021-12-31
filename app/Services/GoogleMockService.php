<?php

namespace App\Services;

class GoogleMockService
{
	/**
	 * @param $receipt
	 * @return array[]
	 */
	public function IsVerification($receipt): array
	{
		$end = substr($receipt,-1);
		if ($end %2 == 0){
			return ["OK" => ["status" => false, "expire_date" => null]];
		} else {
			return ["OK" => ["status" => true, "expire_date" => date("Y-m-d H:i:s", strtotime('-3hours'))]];
		}
	}
}