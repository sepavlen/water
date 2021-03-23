<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\services\MachineService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TableController extends Controller
{
    public function index ()
    {
        $machines = resolve(MachineService::class)->getMachines();
        return view('backend.table.index', compact('machines'));
    }
}
