<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class City extends Model
{
    protected $fillable = [
        'department_id', 'name'
    ];
    protected static function boot(){
        parent::boot();
        static::deleting(function ($city) {
            Log::info("Deleting City: {$city->id}");
            $city->sectors()->delete();
        });
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function sectors() {
        return $this->hasMany(Sector::class);
    }
    public function getAllCities(){
        return City::all();
    }
    public function getcityByName($name){
        return City::where('name', $name)->get();
    }

    public function getCityByDepartmentId($params,$idDepartment){
        return City::where('department_id',$idDepartment)
                    ->where('name',$params["name"])->get();
    }
    public function getCityById($id){
        return City::find($id);
    }
    public function updateCity($data){
        $city = City::getCityById($data['id']);
        if ($city) {
            $city->update($data);
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
    public function createCity($data){
        $city = new City($data);
        $city->save();
    }

}
