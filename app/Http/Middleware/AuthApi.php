<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{

	public const VALID_TOKEN = 'valid_token';
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		$token =  $request->header('api-token');
//		$token =  $request->input('api-token');
		if ($token !== self::VALID_TOKEN){

			return response()->json(['message' => 'Unauthorized'], 401);
		}

        return $next($request);
    }
}
