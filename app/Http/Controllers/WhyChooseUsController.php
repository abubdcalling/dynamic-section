<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class WhyChooseUsController extends Controller
{
    public function show()
    {
        try {
            $whyChooseUs = WhyChooseUs::first();

            if ($whyChooseUs) {
                $whyChooseUs->left_side_icon   = $whyChooseUs->left_side_icon ? url('uploads/WhyChooseUs/' . $whyChooseUs->left_side_icon) : null;
                $whyChooseUs->middle_side_icon = $whyChooseUs->middle_side_icon ? url('uploads/WhyChooseUs/' . $whyChooseUs->middle_side_icon) : null;
                $whyChooseUs->img              = $whyChooseUs->img ? url('uploads/WhyChooseUs/' . $whyChooseUs->img) : null;
                $whyChooseUs->icon             = $whyChooseUs->icon ? url('uploads/WhyChooseUs/' . $whyChooseUs->icon) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'Why Choose Us section retrieved successfully.',
                'data'    => $whyChooseUs
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Why Choose Us: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve Why Choose Us section.'
            ], 500);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            $validated = $request->validate([
                'main_title'                   => 'nullable|string|max:255',

                'left_side_icon'               => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
                'left_side_main_title'         => 'nullable|string|max:255',
                'left_side_comments'           => 'nullable|string',
                'left_side_key_title'          => 'nullable|string|max:255',
                'left_side_content'            => 'nullable|string',

                'middle_side_icon'             => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
                'middle_side_main_title'       => 'nullable|string|max:255',
                'middle_side_comments'         => 'nullable|string',
                'middle_side_key_title'        => 'nullable|string|max:255',
                'middle_side_content'          => 'nullable|string',

                'img'                          => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
                'icon'                         => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
            ]);

            $whyChooseUs = WhyChooseUs::first();

            $leftIcon = $whyChooseUs->left_side_icon ?? null;
            $middleIcon = $whyChooseUs->middle_side_icon ?? null;
            $img = $whyChooseUs->img ?? null;
            $icon = $whyChooseUs->icon ?? null;

            if ($request->hasFile('left_side_icon')) {
                $file = $request->file('left_side_icon');
                $leftIcon = time() . '_left_icon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/WhyChooseUs'), $leftIcon);
            }

            if ($request->hasFile('middle_side_icon')) {
                $file = $request->file('middle_side_icon');
                $middleIcon = time() . '_middle_icon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/WhyChooseUs'), $middleIcon);
            }

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $img = time() . '_img.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/WhyChooseUs'), $img);
            }

            if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $icon = time() . '_icon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/WhyChooseUs'), $icon);
            }

            $data = [
                'main_title'                   => $validated['main_title'] ?? null,

                'left_side_icon'               => $leftIcon,
                'left_side_main_title'         => $validated['left_side_main_title'] ?? null,
                'left_side_comments'           => $validated['left_side_comments'] ?? null,
                'left_side_key_title'          => $validated['left_side_key_title'] ?? null,
                'left_side_content'            => $validated['left_side_content'] ?? null,

                'middle_side_icon'             => $middleIcon,
                'middle_side_main_title'       => $validated['middle_side_main_title'] ?? null,
                'middle_side_comments'         => $validated['middle_side_comments'] ?? null,
                'middle_side_key_title'        => $validated['middle_side_key_title'] ?? null,
                'middle_side_content'          => $validated['middle_side_content'] ?? null,

                'img'                          => $img,
                'icon'                         => $icon,
            ];

            if ($whyChooseUs) {
                $whyChooseUs->update($data);
            } else {
                $whyChooseUs = WhyChooseUs::create($data);
            }

            $whyChooseUs->left_side_icon   = $whyChooseUs->left_side_icon ? url('uploads/WhyChooseUs/' . $whyChooseUs->left_side_icon) : null;
            $whyChooseUs->middle_side_icon = $whyChooseUs->middle_side_icon ? url('uploads/WhyChooseUs/' . $whyChooseUs->middle_side_icon) : null;
            $whyChooseUs->img              = $whyChooseUs->img ? url('uploads/WhyChooseUs/' . $whyChooseUs->img) : null;
            $whyChooseUs->icon             = $whyChooseUs->icon ? url('uploads/WhyChooseUs/' . $whyChooseUs->icon) : null;

            return response()->json([
                'success' => true,
                'message' => 'Why Choose Us saved successfully.',
                'data'    => $whyChooseUs
            ]);
        } catch (Exception $e) {
            Log::error('Error saving Why Choose Us: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save Why Choose Us.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
