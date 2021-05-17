<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyect
 *
 * @property $id
 * @property $proyectImage
 * @property $proyectName
 * @property $proyectDescription
 * @property $url
 * @property $tech
 * @property $created_at
 * @property $updated_at
 *
 * @property DetailsProyect[] $detailsProyects
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyect extends Model
{
    
    static $rules = [
		'proyectImage' => 'required',
		'proyectName' => 'required',
		'proyectDescription' => 'required',
		'url' => 'required',
		'tech' => 'required',
    'gitHubLink' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proyectImage','proyectName','proyectDescription','url','tech','gitHubLink'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailsProyects()
    {
        return $this->hasMany('App\Models\DetailsProyect', 'proyect_id', 'id');
    }
    

}
