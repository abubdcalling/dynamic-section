<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class UpdateController extends Controller
{
    // Show the authenticated user's email
    public function show()
    {
        try {
            $user = Auth::user();

            return response()->json([
                'success' => true,
                'data' => [
                    'email' => $user->email,
                ]
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch user information.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Update the authenticated user's profile
    // public function UpdateEP(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'email' => 'required|email',
    //             'password' => 'required|string|min:8',
    //         ]);

    //         $user = Auth::user();

    //         $user->update([
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Profile updated successfully.',
    //             'data' => [
    //                 'email' => $user->email,
    //             ]
    //         ]);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Profile update failed.',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function UpdateEP(Request $request)
    {
        try {
            // Validate if email or password is present (but not required both at once)
            $request->validate([
                'email' => 'nullable|email',
                'password' => 'nullable|string|min:8',
            ]);

            $user = Auth::user();

            // Prepare data for update
            $updateData = [];

            if ($request->filled('email')) {
                $updateData['email'] = $request->email;
            }

            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            // Update only if there is data to update
            if (!empty($updateData)) {
                $user->update($updateData);
            }

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully.',
                'data' => [
                    'email' => $user->email,
                ]
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Profile update failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
