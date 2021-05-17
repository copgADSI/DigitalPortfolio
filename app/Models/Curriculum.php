<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $fillable = ['gitHubLink'];

    public function detailsProyects()
    {
        return $this->hasMany('App\Models\DetailsProyect', 'proyect_id', 'id');
    }

}
