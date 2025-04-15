<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Possible;
use App\Models\WhyChooseUs;
use App\Models\About;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\OurCoreValue;
use App\Models\Service;

class FrontendController extends Controller
{
    public function getAllData()
    {
        $data = [
            'home' => Home::all(),
            'possible' => Possible::all(),
            'whychooseus' => WhyChooseUs::all(),
            'about' => About::all(),
            'contact' => Contact::all(),
            'menu' => Menu::all(),
            'ourcorevalue' => OurCoreValue::all(),
            'service' => Service::all(),
            'whychooseus' => WhyChooseUs::all(),
        ];

        return response()->json($data);
    }
}
