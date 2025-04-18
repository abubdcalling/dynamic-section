<?php 



namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class BannerController extends Controller
{
    public function show()
    {
        try {
            $banner = Banner::first();

            if ($banner) {
                $banner->logo = $banner->logo ? url('uploads/Banners/' . $banner->logo) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'Banner retrieved successfully.',
                'data'    => $banner
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Banner: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve banner.'
            ], 500);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            $validated = $request->validate([
                'title'        => 'nullable|string|max:255',
                'subtitle'     => 'nullable|string|max:255',
                'description'  => 'nullable|string',
                'button_text'  => 'nullable|string|max:255',
                'logo'         => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            ]);

            $banner = Banner::first();
            $logo = $banner->logo ?? null;

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $logo = time() . '_banner_logo.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Banners'), $logo);
            }

            $data = [
                'title'        => $validated['title'] ?? null,
                'subtitle'     => $validated['subtitle'] ?? null,
                'description'  => $validated['description'] ?? null,
                'button_text'  => $validated['button_text'] ?? null,
                'logo'         => $logo,
            ];

            if ($banner) {
                $banner->update($data);
            } else {
                $banner = Banner::create($data);
            }

            $banner->logo = $banner->logo ? url('uploads/Banners/' . $banner->logo) : null;

            return response()->json([
                'success' => true,
                'message' => 'Banner saved successfully.',
                'data'    => $banner
            ]);
        } catch (Exception $e) {
            Log::error('Error saving banner: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save banner.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
