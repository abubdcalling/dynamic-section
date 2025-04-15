<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::first();
        return response()->json($about);
    }


    // Store or update the About section
    public function storeOrUpdate(Request $request)
    {
        $about = About::first();

        $img2Name = $about->img2 ?? null;  // img2 (back image)
        $img1Name = $about->img1 ?? null;  // img1 (mobile image)

        if ($request->hasFile('img2')) {  // handle img2 upload
            $file = $request->file('img2');
            $img2Name = time() . '_img2.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/Abouts'), $img2Name);
        }

        if ($request->hasFile('img1')) {  // handle img1 upload
            $file = $request->file('img1');
            $img1Name = time() . '_img1.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/Abouts'), $img1Name);
        }

        $data = [
            'main_title'                => $request->input('main_title'),
            'img1'                      => $img1Name,
            'img2'                      => $img2Name,
            '1st_paragraph_subtitle'    => $request->input('1st_paragraph_subtitle'),
            '1st_paragraph_content'     => $request->input('1st_paragraph_content'),
            '2nd_paragraph_subtitle'    => $request->input('2nd_paragraph_subtitle'),
            '2nd_paragraph_content'     => $request->input('2nd_paragraph_content'),
            'name'                      => $request->input('name'),
            'link'                      => $request->input('link'),
        ];

        if ($about) {
            $about->update($data);
        } else {
            $about = About::create($data);
        }

        // Return full URLs for frontend use
        $about->img2 = $about->img2 ? url('uploads/Abouts/' . $about->img2) : null;
        $about->img1 = $about->img1 ? url('uploads/Abouts/' . $about->img1) : null;

        return response()->json($about);
    }
}
