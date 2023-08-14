<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fetchBackendData()
    {
        return response()->json(['message' => 'Hello from Laravel backend!']);
    }

}


