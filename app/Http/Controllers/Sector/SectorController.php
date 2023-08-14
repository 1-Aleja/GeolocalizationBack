<?php

namespace App\Http\Controllers\Sector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sector\{SaveOrUpdateRequest};
use Facades\App\Services\Sector\SectorService;

class SectorController extends Controller
{
    public function index(){
        $response = SectorService::getInfoToListSector();
        return response()->json([
            'success' => true,
            'message' => 'message',
            'data' => $response,
        ]);
    }
    public function saveOrUpdate(SaveOrUpdateRequest $request){
        $response = SectorService::validationForSaveOrUpdateSector($request->all());
        return response()->json([
            'success' => $response["status"],
            'message' => $response["message"],
        ]);
    }
}
