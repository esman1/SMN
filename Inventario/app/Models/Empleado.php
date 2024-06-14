<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Empleado extends Model
{
    static $rules = [
        'Clave_empleado' => 'required',
        'nombre' => 'required|string',
        'apellidoP' => 'required|string',
        'apellidoM' => 'required|string',
        'email' => 'string|nullable',
        'celular' => 'string|nullable',
        'foto_emple' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        'puesto_id' => 'required',
        'departamento_id' => 'required',
        'sucursal_id' => 'required',
        'estatus_id' => 'required',
        'fecha_contrat' => 'datetime|nullable',
        'fecha_alta' => 'datetime|nullable',
        'fecha_baja' => 'datetime|nullable',
        'estatusv' => 'string|nullable',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'id_empleado';
    protected $fillable = [
        'Clave_empleado', 'nombre', 'apellidoP', 'apellidoM', 'email',
        'celular', 'foto_emple', 'puesto_id', 'departamento_id', 'sucursal_id',
        'estatus_id', 'fecha_contrat', 'fecha_alta', 'fecha_baja', 'estatusv'
    ];

    protected $dates = [
        'fecha_contrat', 'fecha_alta', 'fecha_baja',
    ];



    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id_depart');
    }

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'puesto_id', 'id_puesto');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id', 'id_sucursal');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'estatus_id', 'id_estat');
    }

    public function asigapers()
    {
        return $this->hasMany(Asigaper::class, 'empleado_id', 'id_empleado');
    }
}
