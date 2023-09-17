<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
    public function column()
    {
        return $this->belongsTo(Column::class);
    }
    
    public function  product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function  VendingMachine()
    {
        return $this->belongsTo(VendingMachine::class);
    }
    
}
