<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','slug'];//les champs qui peuvent etre change
    public function menus(){
        return $this->hasMany(Menu::class);
        //chaque  categorie a plusieurs menu
    }
    public function getRoutekeyName(){
        return 'slug';//attribut de recherche par defaut est la clé primaire
    }
}
