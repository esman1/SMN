<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asigsuc extends Model
{
    static $rules = [
		
		'suc_id' => 'required',
		'stock_id' => 'required',
        'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $primaryKey ='id_asigsuc';
    protected $fillable = ['suc_id','stock_id','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sucursal()
    {
        return $this->belongsTo(\App\Models\Sucursal::class, 'suc_id', 'id_sucursal');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stock()
    {
        return $this->belongsTo(\App\Models\Stock::class, 'stock_id', 'id_stock');
    }
    public function area()
    {
        return $this->belongsTo(\App\Models\Area::class, 'area_id', 'id_area');
    }
}
