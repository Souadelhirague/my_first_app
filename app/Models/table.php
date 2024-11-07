<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table extends Model
{
    use HasFactory;
    protected $fillable =['name','status','slug'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function sales(){
        return $this->belongsToMany(sales::class);
    }
}
