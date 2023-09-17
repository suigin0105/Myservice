<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;
    
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
    
        public function  VendingMachine()
    {
        return $this->belongsTo(VendingMachine::class);
    }
}
