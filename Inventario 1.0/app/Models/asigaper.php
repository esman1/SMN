<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asigaper
 *
 * @property $id_asigaper
 * @property $empleado_id
 * @property $stock_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Stock $stock
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asigaper extends Model
{
    
    static $rules = [
		
		'empleado_id' => 'required',
		'stock_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey ='id_asigaper';
    protected $fillable = ['empleado_id','stock_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo(\App\Models\Empleado::class, 'empleado_id', 'id_empleado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stock()
    {
        return $this->belongsTo(\App\Models\Stock::class, 'stock_id', 'id_stock');
    }
    

}