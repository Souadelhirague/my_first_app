<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servants extends Model
{
    use HasFactory;
    protected $fillable =['name','address'];
    public function sales(){
        return $this->hasMany(sales::class);
    }
  
}
