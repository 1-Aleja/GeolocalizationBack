<?php

namespace App\Services\Sector;

use App\Models\Constant;
use Facades\App\Models\Sector;
use Facades\App\Models\City;

class SectorService
{
    public function getInfoToListSector(){
        return Sector::getAllSector();
    }
    public function validationForSaveOrUpdateSector($params){
        $city = City::getCityByName($params['city_name']);
        if(!$city->isEmpty()){
            $idCity = $city[0]['id'];
            $sector = Sector::getSectorByCityId($params,$idCity);
            if($sector->isEmpty()){
                return SectorService::saveOrUpdate($params,$idCity);
            }else{
                return [
                    'status'=> false,
                    'message' =>'El campo ya existe',
                ];
            }
        }else{
            return [
                'status'=> false,
                'message' =>'No se puede crear el sector ya que no existe la ciudad',
            ];
        }
        
        
    }
    public function saveOrUpdate($params,$idCity){
        if (isset($params['id'])) {
            $data = [
                'id'=> $params['id'],
                'name'=> $params['name'],
                'city_id'=> $idCity
            ];
                Sector::updateSector($data);
                return  [
                            "status"  => true,
                            "message" => 'Registro actualizado exitosamente'
                        ];
        } else {
            $data =['name'=> $params['name'],'city_id'=> $idCity ];
            Sector::createSector($data);
            return [
                        "status"  => true,
                        "message" => 'Nuevo registro creado exitosamente',
                    ];
        }
    }


}