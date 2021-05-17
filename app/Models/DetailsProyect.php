<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailsProyect
 *
 * @property $id
 * @property $proyect_id
 * @property $technologie_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Proyect $proyect
 * @property Technology $technology
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetailsProyect extends Model
{
    
    static $rules = [
		'proyect_id' => 'required',
		'technologie_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proyect_id','technologie_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyect()
    {
        return $this->hasOne('App\Models\Proyect', 'id', 'proyect_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function technology()
    {
        return $this->hasOne('App\Models\Technology', 'id', 'technologie_id');
    }
    

}
