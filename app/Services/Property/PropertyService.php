<?php

namespace App\Services\Property;

use App\Models\Constant;
use Facades\App\Models\Property;
use Facades\App\Models\City;
use Facades\App\Models\Sector;

class PropertyService
{
    public function getInfoToListProperties(){
        return Property::getAllProperty();
    }
    public function validationForSaveOrUpdateProperty(array $params){
        $city = City::getcityByName($params['city_name']);
        $sector = Sector::getSectorByName($params['sector_name']);
        if(!$city->isEmpty() && !$sector->isEmpty()){
            $idCity = $city[0]['id'];
            $idSector = $sector[0]['id'];
            return PropertyService::saveOrUpdate($params,$idCity,$idSector);
        }else{
            return [
                'status'=> false,
                'message' =>'No se puede crear el inmueble ya que no existe la ciudad o el sector',
            ];
        }
        
    }
    public function saveOrUpdate($params,$idCity,$idSector){
        if (isset($params['id'])) {
            $data = [
                    'id'=> $params['id'],
                    'name_owner'=> $params['name_owner'],
                    'email_owner'=> $params['email_owner'],
                    'residential_set'=> $params['residential_set'],
                    'tower'=> $params['tower'],
                    'appartment'=> $params['appartment'],
                    'address'=> $params['address'],
                    'sector_id'=> $idSector,
                    'city_id'=> $idCity
                ];
            Property::updateProperty($data);
            return  [
                        "status"  => true,
                        "message" => 'Registro actualizado exitosamente'
                    ];
        } else {
                $data = [
                        'name_owner'=> $params['name_owner'],
                        'email_owner'=> $params['email_owner'],
                        'residential_set'=> $params['residential_set'],
                        'tower'=> $params['tower'],
                        'appartment'=> $params['appartment'],
                        'address'=> $params['address'],
                        'sector_id'=> $idSector,
                        'city_id'=> $idCity
                    ];
            Property::createProperty($data);
            return [
                    "status"  => true,
                    "message" => 'Nuevo registro creado exitosamente',
                ];
        }
    }
}