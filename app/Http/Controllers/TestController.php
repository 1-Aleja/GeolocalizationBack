<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function test()
    {
        return response()->json(['message' => 'Backend and frontend are connected!']);
    }
}
