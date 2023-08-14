<?php

namespace App\Services\Country;

use App\Models\Constant;
use Facades\App\Models\Country;

class CountryService
{
    public function getInfoToListCountries(){
        return Country::getAllCountries();
    }
    public function getInforToDetailsCountries(array $params){
        return Country::getAllCountrieswithRelation($params['id']);
    }
    
    public function validationForSaveOrUpdateCountry(array $params){
        $country = Country::getCountryByName($params["name"]);
        if($country->isEmpty()){
            return CountryService::saveOrUpdate($params);
        }else{
            return [
                'status'=> false,
                'message' =>'El campo ya existe',
            ];
        }
    }
    public function saveOrUpdate($params){
        if (isset($params['id'])) {
            $responseUpdateCountry = Country::updateCountry($params);
            return  [
                        "status"  => $responseUpdateCountry["status"],
                        "message" => $responseUpdateCountry["message"]
                    ];
        } else {
            Country::createCountry($params);
            return [
                    "status"  => true,
                    "message" => 'Nuevo registro creado exitosamente',
                ];
        }
    }
}