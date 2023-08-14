<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\App\Services\Property\PropertyService;
use App\Http\Requests\Property\{SaveOrUpdateRequest};

class PropertyController extends Controller
{
    public function index(){
        $response = PropertyService::getInfoToListProperties();
        return response()->json([
            'success' => true,
            'message' => 'message',
            'data' => $response,
        ]);
    }
    public function saveOrUpdateProperty(SaveOrUpdateRequest $request){
        $response = PropertyService::validationForSaveOrUpdateProperty($request->all());
        return response()->json([
            'success' => $response["status"],
            'message' => $response["message"],
        ]);
    }
}
