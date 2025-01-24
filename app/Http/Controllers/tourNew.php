<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class tourNew extends Controller
{
    public function get()
    {
        return Inertia::render('Admin/Dashboard/New');
    }

    public function user()
    {
//        dd("fdsf");
        return Inertia::render('Dashboard');
    }
}
