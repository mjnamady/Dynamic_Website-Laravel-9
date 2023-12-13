<?php

namespace App\Http\Controllers\Home;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function servicesPage(){
        $service = Portfolio::find(1);
        return view('frontend.services_page', compact('service'));
    } // End method
}
