<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;
    protected $fillable = ['servant_id','quantity','total_price',
    'total_received','change','payment_type','payment_status'];
    public function menus(){
        return $this->belongsToMany(menu::class);//en peut trouver une vente(seles) qui contient plusieurs menus 
    }
    public function tables(){
        return $this->belongsToMany(table::class);//une vente dans une table ou plusieurs table
//ce vente est associer à une table ou plusieurs tables
    }
    public function servant(){
        return $this->belongsTo(Servants::class);//chaque vente est associer à un serveur
        
    }
}
