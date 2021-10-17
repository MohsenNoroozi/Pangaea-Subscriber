<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriberController extends Controller
{
    public function get_published(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'topic' => ['required', 'string'],
            'data' => ['required', 'array'],
        ]);

        /* Print data to console */
        Log::channel('stderr')
            ->info(
                print_r([
                    "topic" => $validated['topic'],
                    "data" => $validated['data'],
                ], true)
            );

        /* Return API response */
        return response()->json($validated['data']);
    }
}
