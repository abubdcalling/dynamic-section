<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ServiceController extends Controller
{
    public function show()
    {
        try {
            $service = Service::first();

            if ($service) {
                $fields = ['img', 'icon1', 'icon2', 'icon3', 'icon4'];
                foreach ($fields as $field) {
                    $service->$field = $service->$field ? url('uploads/Services/' . $service->$field) : null;
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Service content retrieved successfully.',
                'data'    => $service
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Service content: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve service content.'
            ], 500);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            $validated = $request->validate([
                'main_title'   => 'nullable|string|max:255',

                'subtitle1'    => 'nullable|string|max:255',
                'description1' => 'nullable|string',
                'icon1'        => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240 ',

                'subtitle2'    => 'nullable|string|max:255',
                'description2' => 'nullable|string',
                'icon2'        => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240 ',

                'subtitle3'    => 'nullable|string|max:255',
                'description3' => 'nullable|string',
                'icon3'        => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240 ',

                'subtitle4'    => 'nullable|string|max:255',
                'description4' => 'nullable|string',
                'icon4'        => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240 ',

                'img'          => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240 ',
            ]);

            $service = Service::first();
            $existing = $service ?? new Service();

            $uploadFields = ['img', 'icon1', 'icon2', 'icon3', 'icon4'];
            $data = $validated;

            foreach ($uploadFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/Services'), $filename);
                    $data[$field] = $filename;
                } else {
                    $data[$field] = $existing->$field ?? null;
                }
            }

            if ($service) {
                $service->update($data);
            } else {
                $service = Service::create($data);
            }

            foreach ($uploadFields as $field) {
                $service->$field = $service->$field ? url('uploads/Services/' . $service->$field) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'Service content saved successfully.',
                'data'    => $service
            ]);
        } catch (Exception $e) {
            Log::error('Error saving Service content: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save service content.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
