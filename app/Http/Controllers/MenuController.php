<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show()
    {
        $menu = Menu::first();
        return response()->json($menu);
    }

    public function storeOrUpdate(Request $request)
    {
        $data = $request->only(['name', 'link']);

        $menu = Menu::first();

        if ($menu) {
            $menu->update($data);
        } else {
            $menu = Menu::create($data);
        }

        return response()->json($menu);
    }
}
