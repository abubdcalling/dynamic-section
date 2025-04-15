<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Possible;

class PossibleController extends Controller
{
    public function show()
    {
        $possible = Possible::first();
        return response()->json($possible);
    }

    // Store or update the Possible section
    public function storeOrUpdate(Request $request)
    {
        $possible = Possible::first();

        $imgName = $possible->img ?? null;

        if ($request->hasFile('img')) {  // handle image upload
            $file = $request->file('img');
            $imgName = time() . '_possible.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/Possibles'), $imgName);
        }

        $data = [
            'img'               => $imgName,
            'title1'            => $request->input('title1'),
            'title1_content'    => $request->input('title1_content'),
            'title2'            => $request->input('title2'),
            'title2_content'    => $request->input('title2_content'),
        ];

        if ($possible) {
            $possible->update($data);
        } else {
            $possible = Possible::create($data);
        }

        // Return full image URL for frontend
        $possible->img = $possible->img ? url('uploads/Possibles/' . $possible->img) : null;

        return response()->json($possible);
    }
}
