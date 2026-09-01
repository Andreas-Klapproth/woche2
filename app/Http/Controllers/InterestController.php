<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\View\View;

class InterestController extends Controller
{
    public function index(): View
    {
        $interests = Interest::all();
        return view('interests.index', compact('interests'));
    }
}
