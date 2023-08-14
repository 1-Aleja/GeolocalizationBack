<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\App\Services\City\CityService;
use App\Http\Requests\City\{SaveOrUpdateRequest};

class CityController extends Controller
{
    public function index(){
        $response = CityService::getInfoToListCities();
        return response()->json([
            'success' => true,
            'message' => 'message',
            'data' => $response,
        ]);
    }
    public function saveOrUpdate(SaveOrUpdateRequest $request){
        $response = CityService::validationForSaveOrUpdateCity($request->all());
        return response()->json([
            'success' => $response["status"],
            'message' => $response["message"],
            'data' => $response,
        ]);
    }
    
}
