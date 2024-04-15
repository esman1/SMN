<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puesto
 *
 * @property $id_puesto
 * @property $Clave_puesto
 * @property $Des_cort_p
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Puesto extends Model
{
    
    static $rules = [
		'id_puesto' => 'required',
		'Clave_puesto' => 'required',
		'Des_cort_p' => 'string',
		'descripcion' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey ='id_puesto';
    protected $fillable = ['id_puesto','Clave_puesto','Des_cort_p','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany(\App\Models\Empleado::class, 'id_puesto', 'puesto_id');
    }
    

}
