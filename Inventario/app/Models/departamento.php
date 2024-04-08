<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamento
 *
 * @property $id_depart
 * @property $Clave_dep
 * @property $Desc_corta_d
 * @property $Desc_d
 *
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Departamento extends Model
{
    
    static $rules = [
		
		'Clave_dep' => 'required',
		'Desc_corta_d' => 'required|string',
		'Desc_d' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_depart';
    protected $fillable = ['Clave_dep','Desc_corta_d','Desc_d'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany(\App\Models\Empleado::class, 'id_depart', 'departamento_id');
    }
    

}
