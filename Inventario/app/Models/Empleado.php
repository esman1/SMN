<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id_empleado
 * @property $Clave_empleado
 * @property $nombre
 * @property $apellidoP
 * @property $apellidoM
 * @property $email
 * @property $celular
 * @property $foto_emple
 * @property $puesto_id
 * @property $departamento_id
 * @property $sucursal_id
 * @property $estatus
 * @property $fecha_contrat
 * @property $fecha_alta
 * @property $fecha_baja
 * @property $created_at
 * @property $updated_at
 *
 * @property Departamento $departamento
 * @property Puesto $puesto
 * @property Sucursal $sucursal
 * @property Asigaper[] $asigapers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		
		'Clave_empleado' => 'required',
		'nombre' => 'required|string',
		'apellidoP' => 'required|string',
		'apellidoM' => 'required|string',
		'email' => 'string',
		'celular' => 'string',
		//'foto_emple' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
    	'foto_emple' => 'string',
        'puesto_id' => 'required',
		'departamento_id' => 'required',
		'sucursal_id' => 'required',
		'estatus' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_empleado';
    protected $fillable = ['Clave_empleado','nombre','apellidoP','apellidoM','email','celular','foto_emple','puesto_id','departamento_id','sucursal_id','estatus','fecha_contrat','fecha_alta','fecha_baja'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class, 'departamento_id', 'id_depart');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function puesto()
    {
        return $this->belongsTo(\App\Models\Puesto::class, 'puesto_id', 'id_puesto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sucursal()
    {
        return $this->belongsTo(\App\Models\Sucursal::class, 'sucursal_id', 'id_sucursal');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asigapers()
    {
        return $this->hasMany(\App\Models\Asigaper::class, 'id_empleado', 'empleado_id');
    }
    

}
