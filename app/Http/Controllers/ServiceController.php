<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show()
    {
        $service = Service::first();
        return response()->json($service);
    }

    public function storeOrUpdate(Request $request)
    {
        $service = Service::first();

        $data = [
            'main_title_from_1st_section'      => $request->input('main_title_from_1st_section'),
            'icon_from_1st_section'            => $request->input('icon_from_1st_section'),
            'content_from_1st_section'         => $request->input('content_from_1st_section'),
            'key_title_from_1st_section'       => $request->input('key_title_from_1st_section'),
            'sub_content_from_1st_section'     => $request->input('sub_content_from_1st_section'),

            'main_title_from_2nd_section'      => $request->input('main_title_from_2nd_section'),
            'icon_from_2nd_section'            => $request->input('icon_from_2nd_section'),
            'content_from_2nd_section'         => $request->input('content_from_2nd_section'),
            'key_title_from_2nd_section'       => $request->input('key_title_from_2nd_section'),
            'sub_content_from_2nd_section'     => $request->input('sub_content_from_2nd_section'),

            'main_title_from_3rd_section'      => $request->input('main_title_from_3rd_section'),
            'icon_from_3rd_section'            => $request->input('icon_from_3rd_section'),
            'content_from_3rd_section'         => $request->input('content_from_3rd_section'),
            'key_title_from_3rd_section'       => $request->input('key_title_from_3rd_section'),
            'sub_content_from_3rd_section'     => $request->input('sub_content_from_3rd_section'),

            'main_title_from_4th_section'      => $request->input('main_title_from_4th_section'),
            'icon_from_4th_section'            => $request->input('icon_from_4th_section'),
            'content_from_4th_section'         => $request->input('content_from_4th_section'),
            'key_title_from_4th_section'       => $request->input('key_title_from_4th_section'),
            'sub_content_from_4th_section'     => $request->input('sub_content_from_4th_section'),

            'main_title_from_5th_section'      => $request->input('main_title_from_5th_section'),
            'icon_from_5th_section'            => $request->input('icon_from_5th_section'),
            'content_from_5th_section'         => $request->input('content_from_5th_section'),
            'key_title_from_5th_section'       => $request->input('key_title_from_5th_section'),
            'sub_content_from_5th_section'     => $request->input('sub_content_from_5th_section'),
        ];

        if ($service) {
            $service->update($data);
        } else {
            $service = Service::create($data);
        }

        return response()->json($service);
    }
}
