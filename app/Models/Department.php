<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Department extends Model
{
    protected $fillable = [
        'country_id', 'name'
    ];

    protected static function boot(){
        parent::boot();
        static::deleting(function ($department) {
            $department->cities()->delete();
        });
    }
    public function cities() {
        return $this->hasMany(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function getAllDepartment()
    {
        return Department::all();
    }
    public function getDepartmentByname($name){
        return Department::where('name', $name)->get();
    }
    public function getDepartmentByCountryId($params,$idCountry){
        return Department::where('country_id',$idCountry)
                    ->where('name', $params["name"])
                    ->get();
    }
    public function getDepartmentById($id){
        return Department::find($id);
    }
    public function updateDepartment($data){
        $department = Department::getDepartmentById($data['id']);
        if ($department) {
            $department->update($data);
            return  [
                "status"  => true,
                "message" => 'Registro actualizado exitosamente'
            ];
        }
        return  [
            "status"  => false,
            "message" => 'No existe este registro'
        ];
    }
    public function createDepartment($params){
        $department = new Department($params);
        $department->save();
    }
}
