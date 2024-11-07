<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
     protected $fillable=['title','slug','description','image','price','category_id'];
    public function category(){
return $this->belongsTo(Category::class);
     }
public function getRouteKeyName(){
return "slug";// en utilise slug pour faire une rechercher dans le modal
}
public function sales(){
     return $this->belongsToMany(sales::class);//table intermédiare
}
// public function table(){
//      return $this->beLongTo (table::class);
// }
}
