<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendingMachine extends Model
{
    use HasFactory;
    
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
    
       public function columns()
    {
        return $this->hasMany(Columns::class);
    }
    
  
}
