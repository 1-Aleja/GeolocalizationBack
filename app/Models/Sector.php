<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'city_id', 'name'
    ];
    protected static function boot(){
        parent::boot();
        static::deleting(function ($sector) {
            Log::info("Deleting Sector");
            Log::info("Deleting Sector: {$sector->cities()}");
            $sector->properties()->delete();
        });
    }

    public function properties() {
        return $this->hasMany(Property::class);
    }

        public function city()
    {
        return $this->belongsTo(City::class);
    }
    
    public function getAllSector(){
        return Sector::all();
    }
    public function createSector($data){
        $sector = new Sector($data);
        $sector->save();
    }
    public function getSectorById($id){
        return Sector::find($id);
    }
    public function getSectorByName($name){
        return  Sector::where('name', $name)->get();
    }
    public function updateSector($data){
        $sector = Sector::getSectorById($data['id']);
        if ($sector) {
            $sector->update($data);
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
    public function getSectorByCityId($params,$idCity){
        return Sector::where('city_id',$idCity)
                        ->where('name',$params["name"])->get();
    }
    
}
