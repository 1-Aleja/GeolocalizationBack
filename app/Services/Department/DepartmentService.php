<?php

namespace App\Services\Department;

use App\Models\Constant;
use Facades\App\Models\Department;
use Facades\App\Models\Country;
class DepartmentService
{
    public function getInfoToListDepartment(){
        return Department::getAllDepartment();
    }
    public function validationForSaveOrUpdateDepartment(array $params){
        $country = Country::getCountryByName($params['country_name']);
        if(!$country->isEmpty()){
            $idCountry = $country[0]['id'];
            $department = Department::getDepartmentByCountryId($params,$idCountry);
            if($department->isEmpty()){
                return DepartmentService::saveOrUpdate($params,$idCountry);
            }else{
                return [
                    'status'=> false,
                    'message' =>'El campo ya existe',
                ];
            }
        }else{
            return [
                'status'=> false,
                'message' =>'No se puede crear el sector ya que no existe el país',
            ];
        }
        
    }
    public function saveOrUpdate($params,$idCountry){
        if (isset($params['id'])) {
            $data = [
                    'id'=> $params['id'],
                    'name'=> $params['name'],
                    'country_id'=> $idCountry
                ];
            Department::updateDepartment($data);
            return  [
                        "status"  => true,
                        "message" => 'Registro actualizado exitosamente'
                    ];
        } else {
            $data =['name'=> $params['name'],'country_id'=> $idCountry ];
            Department::createDepartment($data);
            return [
                    "status"  => true,
                    "message" => 'Nuevo registro creado exitosamente',
                ];
        }
    }
}