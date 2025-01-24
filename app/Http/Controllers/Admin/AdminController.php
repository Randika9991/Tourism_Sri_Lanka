<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function getAdminDashboard()
    {
        return Inertia::render('Admin/Dashboard/Dashboard');
    }

    public function getAdminDistrict()
    {
        return Inertia::render('Admin/District/Districts');
    }
}
