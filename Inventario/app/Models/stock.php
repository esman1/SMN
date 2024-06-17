<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 *
 * @property $id_stock
 * @property $Nserie
 * @property $modelo_id
 * @property $tipo_id
 * @property $marca_id
 * @property $sisop_id
 * @property $proces_id
 * @property $mem_id
 * @property $disc_d
 * @property $created_at
 * @property $updated_at
 *
 * @property Discod $discod
 * @property Marca $marca
 * @property Memoria $memoria
 * @property Modelo $modelo
 * @property Procesador $procesador
 * @property Sisop $sisop
 * @property Tipo $tipo
 * @property Asigaper[] $asigapers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Stock extends Model
{
    
    static $rules = [
		
		'Nserie' => 'required|string',
		'modelo_id' => 'required',
		'tipo_id' => 'required',
		'marca_id' => 'required',
		'sisop_id' => 'required',
		'proces_id' => 'required',
		'mem_id' => 'required',
		'disc_d' => 'required',
        'Estatus' =>'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_stock';
    protected $fillable = ['Nserie','modelo_id','tipo_id','marca_id','sisop_id','proces_id','mem_id','disc_d','Estatus'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discod()
    {
        return $this->belongsTo(\App\Models\Discod::class, 'disc_d', 'id_disc');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca()
    {
        return $this->belongsTo(\App\Models\Marca::class, 'marca_id', 'id_marca');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memoria()
    {
        return $this->belongsTo(\App\Models\Memoria::class, 'mem_id', 'id_mem');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modelo()
    {
        return $this->belongsTo(\App\Models\Modelo::class, 'modelo_id', 'id_modelo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function procesador()
    {
        return $this->belongsTo(\App\Models\Procesador::class, 'proces_id', 'id_proc');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sisop()
    {
        return $this->belongsTo(\App\Models\Sisop::class, 'sisop_id', 'id_sisop');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo()
    {
        return $this->belongsTo(\App\Models\Tipo::class, 'tipo_id', 'id_tipo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asigapers()
    {
        return $this->hasMany(\App\Models\Asigaper::class, 'id_stock', 'stock_id');
    }
    

}
