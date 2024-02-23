<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubmissionController extends Controller
{
    public function submit(Request $request): JsonResponse
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate(
                [
                    'name'    => 'required|string|min:1|max:255',
                    'email'   => 'required|email',
                    'message' => 'required|string|min:2|max:1000',
                ]
            );

            // Dispatch the ProcessSubmission job with the validated data
            ProcessSubmission::dispatch($validatedData);

            return response()->json(['message' => 'Submission successful'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            // Log unexpected errors
            Log::error('Error occurred while processing submission: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
}
