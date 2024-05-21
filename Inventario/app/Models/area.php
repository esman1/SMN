<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
        
    static $rules = [
		
		'nomArea' => 'required',
	
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_area';
    protected $fillable = ['nomArea'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asigSuc()
    {
        return $this->hasMany(\App\Models\Asigsuc::class, 'id_area', 'area_id');
    }
    
}
