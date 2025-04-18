<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class AboutController extends Controller
{
    public function show()
    {
        try {
            $about = About::first();

            if ($about) {
                $about->img1 = $about->img1 ? url('uploads/Abouts/' . $about->img1) : null;
                $about->img2 = $about->img2 ? url('uploads/Abouts/' . $about->img2) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'About section retrieved successfully.',
                'data'    => $about
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching About section: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve About section.'
            ], 500);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            $validated = $request->validate([
                'main_title'                => 'nullable|string|max:255',
                'img1'                      => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
                'img2'                      => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
                'first_paragraph_subtitle'  => 'nullable|string',
                'first_paragraph_content'   => 'nullable|string',
                'second_paragraph_subtitle' => 'nullable|string',
                'second_paragraph_content'  => 'nullable|string',
                'name'                      => 'nullable|string|max:255',
                'link'                      => 'nullable|string|max:255',
            ]);

            $about = About::first();
            $img1 = $about->img1 ?? null;
            $img2 = $about->img2 ?? null;

            if ($request->hasFile('img1')) {
                $file = $request->file('img1');
                $img1 = time() . '_img1.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Abouts'), $img1);
            }

            if ($request->hasFile('img2')) {
                $file = $request->file('img2');
                $img2 = time() . '_img2.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Abouts'), $img2);
            }

            $data = [
                'main_title'                => $validated['main_title'] ?? null,
                'img1'                      => $img1,
                'img2'                      => $img2,
                'first_paragraph_subtitle'  => $validated['first_paragraph_subtitle'] ?? null,
                'first_paragraph_content'   => $validated['first_paragraph_content'] ?? null,
                'second_paragraph_subtitle' => $validated['second_paragraph_subtitle'] ?? null,
                'second_paragraph_content'  => $validated['second_paragraph_content'] ?? null,
                'name'                      => $validated['name'] ?? null,
                'link'                      => $validated['link'] ?? null,
            ];

            if ($about) {
                $about->update($data);
            } else {
                $about = About::create($data);
            }

            $about->img1 = $about->img1 ? url('uploads/Abouts/' . $about->img1) : null;
            $about->img2 = $about->img2 ? url('uploads/Abouts/' . $about->img2) : null;

            return response()->json([
                'success' => true,
                'message' => 'About section saved successfully.',
                'data'    => $about
            ]);
        } catch (Exception $e) {
            Log::error('Error saving About section: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save About section.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
