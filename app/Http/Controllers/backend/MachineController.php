<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function machine () 
    {
        return view('backend.machine.machine');
    }
}
