<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    protected $fillable = [
        'name'
    ];
    protected static function boot(){
        parent::boot();
        static::deleting(function ($country) {
            $country->departments()->delete();
        });
    }
    public function departments() {
        return $this->hasMany(Department::class);
    }
    public function getAllCountries(){
        return Country::all();
    }
    public function getAllCountrieswithRelation($id){
        return Country::where('id',$id)->with('departments.cities.sectors')->get();
    }
    public function getCountryByName($name){
        return Country::where('name', $name)->get();
    }
    public function getCountryById($id){
        return Country::find($id);
    }
    public function updateCountry($params){
        $country = Country::getCountryById($params['id']);
        if ($country) {
            $country->update($params);
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
    public function createCountry($params){
        $country = new Country($params);
        $country->save();
    }
    
}
