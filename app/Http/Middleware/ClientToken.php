<?php

namespace App\Http\Middleware;

use App\Models\Device;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
		if ($request->input('client_token')) {
			if (Device::where('token', $request->input('client_token'))->first()) {
				return $next($request);
			}
			return response(['message' => 'client_token kayıtlı olan client_token değerinden farklı'],Response::HTTP_UNAUTHORIZED);
		}
		return response(['message' => 'client_token parametresi eksik'], Response::HTTP_UNAUTHORIZED);
	}
}
