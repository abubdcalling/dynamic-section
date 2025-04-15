<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function show()
    {
        $whychooseus = WhyChooseUs::first();
        return response()->json($whychooseus);
    }

    public function storeOrUpdate(Request $request)
    {
        $whyChooseUs = WhyChooseUs::first();

        $data = [
            'main_title'                   => $request->input('main_title'),

            'left_side_main_title'         => $request->input('left_side_main_title'),
            'left_side_icon'               => $request->input('left_side_icon'),
            'left_side_comments'           => $request->input('left_side_comments'),
            'left_side_key_title'          => $request->input('left_side_key_title'),
            'left_side_content'            => $request->input('left_side_content'),

            'middle_side_main_title'       => $request->input('middle_side_main_title'),
            'middle_side_icon'             => $request->input('middle_side_icon'),
            'middle_side_comments'         => $request->input('middle_side_comments'),
            'middle_side_key_title'        => $request->input('middle_side_key_title'),
            'middle_side_content'          => $request->input('middle_side_content'),

            'right_side_img'               => $request->input('right_side_img'),
            'right_side_icon'              => $request->input('right_side_icon'),
        ];

        if ($whyChooseUs) {
            $whyChooseUs->update($data);
        } else {
            $whyChooseUs = WhyChooseUs::create($data);
        }

        return response()->json($whyChooseUs);
    }
}
