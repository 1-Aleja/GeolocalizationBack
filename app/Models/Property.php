<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name_owner', 'email_owner','residential_set','tower','appartment','address','sector_id','city_id'
    ];
    public function getAllProperty(){
        return Property::all();
    }
    public function sector(){
        return $this->belongsTo(Sector::class);
    }
    public function getPropertyById($id){
        return Property::find($id);
    }
    public function updateProperty($data){
        $property = Property::getPropertyById($data['id']);
        if ($property) {
            $property->update($data);
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
    public function createProperty($params){
        $property = new Property($params);
        $property->save();
    }
    
}
