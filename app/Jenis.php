<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    public function barang(){
        return $this->hasMany(Barang::class);
    }
}
