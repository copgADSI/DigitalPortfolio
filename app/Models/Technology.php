<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Technology
 *
 * @property $id
 * @property $techLogo
 * @property $techName
 * @property $created_at
 * @property $updated_at
 *
 * @property DetailsProyect[] $detailsProyects
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Technology extends Model
{
    
    static $rules = [
		'techLogo' => 'required',
		'techName' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['techLogo','techName'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailsProyects()
    {
        return $this->hasMany('App\Models\DetailsProyect', 'technologie_id', 'id');
    }
    

}
