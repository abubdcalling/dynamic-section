<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class MenuController extends Controller
{
    public function show()
    {
        try {
            $menu = Menu::first();

            if ($menu) {
                $menu->logo = $menu->logo ? url('uploads/Menus/' . $menu->logo) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'Menu retrieved successfully.',
                'data'    => $menu
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Menu: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve menu.'
            ], 500);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            $validated = $request->validate([
                'name1' => 'nullable|string|max:255',
                'link1' => 'nullable|string',
                'name2' => 'nullable|string|max:255',
                'link2' => 'nullable|string',
                'name3' => 'nullable|string|max:255',
                'link3' => 'nullable|string',
                'name4' => 'nullable|string|max:255',
                'link4' => 'nullable|string',
                'logo'  => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
            ]);

            $menu = Menu::first();
            $logo = $menu->logo ?? null;

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $logo = time() . '_menu_logo.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Menus'), $logo);
            }

            $data = [
                'name1' => $validated['name1'] ?? null,
                'link1' => $validated['link1'] ?? null,
                'name2' => $validated['name2'] ?? null,
                'link2' => $validated['link2'] ?? null,
                'name3' => $validated['name3'] ?? null,
                'link3' => $validated['link3'] ?? null,
                'name4' => $validated['name4'] ?? null,
                'link4' => $validated['link4'] ?? null,
                'logo'  => $logo,
            ];

            if ($menu) {
                $menu->update($data);
            } else {
                $menu = Menu::create($data);
            }

            $menu->logo = $menu->logo ? url('uploads/Menus/' . $menu->logo) : null;

            return response()->json([
                'success' => true,
                'message' => 'Menu saved successfully.',
                'data'    => $menu
            ]);
        } catch (Exception $e) {
            Log::error('Error saving Menu: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save menu.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
