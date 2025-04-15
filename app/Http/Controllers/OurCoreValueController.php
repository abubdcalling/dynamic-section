<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OurCoreValue;
use Illuminate\Http\Request;

class OurCoreValueController extends Controller
{
    public function show()
    {
        $possible = OurCoreValue::first();
        return response()->json($possible);
    }

    // Store or update the OurCoreValue section
    public function storeOrUpdate(Request $request)
    {
        $coreValue = OurCoreValue::first();

        $bigImg = $coreValue->big_img_right_side ?? null;
        $sideImgs = [
            'side_img1' => $coreValue->side_img1 ?? null,
            'side_img2' => $coreValue->side_img2 ?? null,
            'side_img3' => $coreValue->side_img3 ?? null,
            'side_img4' => $coreValue->side_img4 ?? null,
        ];

        // Handle big image upload
        if ($request->hasFile('big_img_right_side')) {
            $file = $request->file('big_img_right_side');
            $bigImg = time() . '_big_img.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/OurCoreValues'), $bigImg);
        }

        // Handle side images upload
        foreach ($sideImgs as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $sideImgs[$key] = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/OurCoreValues'), $sideImgs[$key]);
            }
        }

        $data = [
            'main_title'            => $request->input('main_title'),
            'big_img_right_side'    => $bigImg,
            'side_img1'             => $sideImgs['side_img1'],
            'side_img1_title'       => $request->input('side_img1_title'),
            'side_img1_content'     => $request->input('side_img1_content'),
            'side_img2'             => $sideImgs['side_img2'],
            'side_img2_title'       => $request->input('side_img2_title'),
            'side_img2_content'     => $request->input('side_img2_content'),
            'side_img3'             => $sideImgs['side_img3'],
            'side_img3_title'       => $request->input('side_img3_title'),
            'side_img3_content'     => $request->input('side_img3_content'),
            'side_img4'             => $sideImgs['side_img4'],
            'side_img4_title'       => $request->input('side_img4_title'),
            'side_img4_content'     => $request->input('side_img4_content'),
        ];

        if ($coreValue) {
            $coreValue->update($data);
        } else {
            $coreValue = OurCoreValue::create($data);
        }

        // Attach full URL for images before sending response
        $coreValue->big_img_right_side = $coreValue->big_img_right_side ? url('uploads/OurCoreValues/' . $coreValue->big_img_right_side) : null;
        for ($i = 1; $i <= 4; $i++) {
            $key = 'side_img' . $i;
            $coreValue->$key = $coreValue->$key ? url('uploads/OurCoreValues/' . $coreValue->$key) : null;
        }

        return response()->json($coreValue);
    }
}
