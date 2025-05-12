<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PatientController extends Controller
{
    public function registerPatient(Request $request)
    {
        // Validate incoming patient registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Prepare the data to be sent to the external hospital API
        $registrationData = [
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ];

        // Send the registration request to the external API (replace 'GPITG_API_URL' with the actual URL)
        try {
            $response = Http::post(env('GPITG_API_URL'), $registrationData);

            // Check if the response is successful
            if ($response->successful()) {
                $checkInDateTime = $response->json()['Check_In_Date_And_Time'];

                // Return the success message with check-in date and time
                return response()->json([
                    'message' => 'Registration successful.',
                    'check_in_date_and_time' => $checkInDateTime,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Failed to register patient with Gpitg Hospital. Please try again later.',
                ], 500);
            }
        } catch (\Exception $e) {
            // Handle exceptions, such as network errors
            return response()->json([
                'message' => 'An error occurred while trying to communicate with the hospital API. Please try again later.',
            ], 500);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
