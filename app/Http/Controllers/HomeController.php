<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function show()
    {
        $possible = Home::first();
        return response()->json($possible);
    }


    public function storeOrUpdate(Request $request)
    {
        $home = Home::first();

        $imgName = $home->img ?? null;

        if ($request->hasFile('img')) {  // handle image upload
            $file = $request->file('img');
            $imgName = time() . '_home.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/Homes'), $imgName);
        }

        $data = [
            'main_title'                 => $request->input('main_title'),
            'sub_title_after_main_title' => $request->input('sub_title_after_main_title'),
            'img'                        => $imgName,
            'second_sub_title_content'   => $request->input('second_sub_title_content'),
            'name'                       => $request->input('name'),
            'link'                       => $request->input('link'),
        ];

        if ($home) {
            $home->update($data);
        } else {
            $home = Home::create($data);
        }

        // Return full image URL for frontend
        $home->img = $home->img ? url('uploads/Homes/' . $home->img) : null;

        return response()->json($home);
    }
}
