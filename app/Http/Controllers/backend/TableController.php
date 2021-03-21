<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TableController extends Controller
{
    public function index ()
    {
        return view('backend.table.index');
    }
}
