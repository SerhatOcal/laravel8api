<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;

class ResultTypeController extends Controller
{
	const Success       = 1;
	const Information   = 2;
	const Warning       = 2;
	const Error         = 4;
}
