<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function home()
    {
        return view('home');
    }


}
