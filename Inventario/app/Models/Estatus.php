<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class estatus extends Model
{
    static $rules = [
		'id_estat' => 'required',
		'estat' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_estat','estat'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany(\App\Models\Stock::class, 'id_estat', 'estatus_id');
    }
    
}
