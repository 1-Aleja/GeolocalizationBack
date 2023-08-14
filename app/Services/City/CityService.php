<?php

namespace App\Services\City;

use App\Models\Constant;
use Facades\App\Models\City;
use Facades\App\Models\Department;

class CityService
{
    public function getInfoToListCities(){
        return City::getAllCities();
    }
    public function validationForSaveOrUpdateCity(array $params){
        $department = Department::getDepartmentByname($params['department_name']);
        if(!$department->isEmpty()) {
            $idDepartment = $department[0]['id'];
            $city = City::getCityByDepartmentId($params,$idDepartment);
            if($city->isEmpty()){
                return CityService::saveOrUpdate($params,$idDepartment);
            }else{
                return [
                    'status'=> false,
                    'message' =>'El campo ya existe',
                ];
            }
        }else{
            return [
                'status'=> false,
                'message' =>'No se puede crear el sector ya que no existe el departamento',
            ];
        }

    }
    public function saveOrUpdate($params,$idDepartment){
        if (isset($params['id'])) {
            $data = [
                'id'=> $params['id'],
                'name'=> $params['name'],
                'department_id'=> $idDepartment
            ];
            City::updateCity($data);
            return  [
                        "status"  => true,
                        "message" => 'Registro actualizado exitosamente'
                    ];
        } else {
            $data =['name'=> $params['name'],'department_id'=> $idDepartment ];
            City::createCity($data);
            return [
                    "status"  => true,
                    "message" => 'Nuevo registro creado exitosamente',
                ];
        }
    }
}