<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\App\Services\Country\CountryService;
use App\Http\Requests\Country\{SaveOrUpdateRequest};
use Facades\App\Models\Country;

class CountryController extends Controller
{
    
    public function indexAllCountriesWithRelation(){
        $response = CountryService::getInfoToListCountries();
        
        return response()->json([
            'success' => true,
            'message' => 'message',
            'data' => $response,
        ]);
    }
    public function getDetailsCountries(Request $request){
        $response = CountryService::getInforToDetailsCountries($request->all());
        return response()->json([
            'success' => true,
            'message' => 'message',
            'data' => $response,
        ]);
    }
    public function saveOrUpdate(SaveOrUpdateRequest $request){
        $response = CountryService::validationForSaveOrUpdateCountry($request->all());
        return response()->json([
            'success' => $response["status"],
            'message' => $response["message"],
            'data' => $response,
        ]);
    }
    public function deleteCountry(){
        $country = Country::find(1);
        $country->delete();
    }
}
