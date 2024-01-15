<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // je charge automatiquement le nom et la description de categorie à chq fois que je récupère un msg
    protected $fillable = ['category_name', 'category_description'];

    // nom au pluriel car un pdt peut regrper pls pdts
    // cardinalité 0,n
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
