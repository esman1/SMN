<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valid extends Model
{
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function asigsuc()
    {
        return $this->hasOne(AsigSuc::class);
    }

    public function asigaper()
    {
        return $this->hasOne(AsigAper::class);
    }
}
