<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\App\Services\Department\DepartmentService;
use App\Http\Requests\Department\{SaveOrUpdateRequest};

class DepartmentController extends Controller
{
    public function index(){
        $response = DepartmentService::getInfoToListDepartment();
        return response()->json([
            'success' => true,
            'message' => 'message',
            'data' => $response,
        ]);
    }
    public function saveOrUpdate(SaveOrUpdateRequest $request){
        $response = DepartmentService::validationForSaveOrUpdateDepartment($request->all());
        return response()->json([
            'success' => $response["status"],
            'message' => $response["message"],
            'data' => $response,
        ]);
    }
}
