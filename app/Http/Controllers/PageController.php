<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{


    public function home() : View
    {
        return view('home');
    }


}
