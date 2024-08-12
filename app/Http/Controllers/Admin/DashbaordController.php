<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DomainController;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
