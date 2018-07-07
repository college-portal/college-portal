<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{

	public function json($data, $statusCode = 200):JsonResponse { return response()->json($data, $statusCode); }

	public function created($data):JsonResponse { return response()->json($data, 201); }

	public function ok($data = null):JsonResponse {
		return response()->json($data ?? [
				'message' => 'success'
			]);
	}

	public function notFound(string $message = null):JsonResponse {
		return response()->json([
			'message' => $message ?? 'not found'
		], 404);
	}

	public function badRequest(string $message = null):JsonResponse {
		return response()->json([
			'message' => $message ?? 'invalid request'
		], 400);
	}

	public function error(string $message = null, \Exception $ex = null):JsonResponse {
		return response()->json([
			'message' => $message ?? 'an error occurred',
			'exception' => $ex->getMessage()
		], 500);
	}

	public function conflict(string $message = null):JsonResponse {
		return response()->json([
			'message' => $message ?? 'there was a conflict'
		], 409);
	}
}