<?php

namespace App\Http\Controllers;

use App\Models\OurComprehensiveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class OurComprehensiveServiceController extends Controller
{
    public function show()
    {
        try {
            // Retrieve the first record from the database
            $service = OurComprehensiveService::first();

            // If the record exists, update the image URLs
            if ($service) {
                $service->img1 = $service->img1 ? url('uploads/Services/' . $service->img1) : null;
                $service->img2 = $service->img2 ? url('uploads/Services/' . $service->img2) : null;
                $service->img3 = $service->img3 ? url('uploads/Services/' . $service->img3) : null;
                $service->img4 = $service->img4 ? url('uploads/Services/' . $service->img4) : null;
                $service->img5 = $service->img5 ? url('uploads/Services/' . $service->img5) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'Comprehensive service content retrieved successfully.',
                'data'    => $service
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Comprehensive Service: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve comprehensive service content.'
            ], 500);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            // Validate the incoming data
            $validated = $request->validate([
                'title'      => 'nullable|string|max:255',
                'subtitle'   => 'nullable|string|max:255',

                'title1'     => 'nullable|string|max:255',
                'content1'   => 'nullable|string',
                'img1'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

                'title2'     => 'nullable|string|max:255',
                'content2'   => 'nullable|string',
                'img2'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

                'title3'     => 'nullable|string|max:255',
                'content3'   => 'nullable|string',
                'img3'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

                'title4'     => 'nullable|string|max:255',
                'content4'   => 'nullable|string',
                'img4'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

                'title5'     => 'nullable|string|max:255',
                'content5'   => 'nullable|string',
                'img5'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            ]);

            // Get the existing service or create a new one
            $service = OurComprehensiveService::first();
            $data = $validated;

            // Handle image uploads
            $images = ['img1', 'img2', 'img3', 'img4', 'img5'];
            foreach ($images as $img) {
                if ($request->hasFile($img)) {
                    $file = $request->file($img);
                    $data[$img] = time() . '_' . $img . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/Services'), $data[$img]);
                }
            }

            // If a service already exists, update it; otherwise, create a new record
            if ($service) {
                $service->update($data);
            } else {
                $service = OurComprehensiveService::create($data);
            }

            // Update image URLs for the response
            foreach ($images as $img) {
                $service->$img = $service->$img ? url('uploads/Services/' . $service->$img) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'Comprehensive service content saved successfully.',
                'data'    => $service
            ]);
        } catch (Exception $e) {
            Log::error('Error saving Comprehensive Service content: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save comprehensive service content.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    
}
