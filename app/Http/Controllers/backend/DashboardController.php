<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {

        return view('backend.dashboard');
    }

    public function errors ()
    {
        return view('backend.dashboard.unknown-errors');
    }

    public function errorRemove (Request $request)
    {
        if (session('unknown_errors.'.$request->id)){
            session()->forget('unknown_errors.'.$request->id);
        }
    }
}
