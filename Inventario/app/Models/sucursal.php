<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sucursal
 *
 * @property $id_sucursal
 * @property $Clave_sucursal
 * @property $Nom_sucursal
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sucursal extends Model
{
    
    static $rules = [
	
		'Clave_sucursal' => 'required',
		'Nom_sucursal' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_sucursal';
    protected $fillable = ['Clave_sucursal','Nom_sucursal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany(\App\Models\Empleado::class, 'id_sucursal', 'sucursal_id');
    }
    

}
