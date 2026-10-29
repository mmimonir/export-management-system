<?php

namespace Modules\EMS\Http\Controllers;

use App\Http\Controllers\Controller;

class EMSController extends Controller
{
    public function dashboard()
    {
        return view('ems::dashboard');
    }
}
