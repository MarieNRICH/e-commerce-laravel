<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    //je charge automatiquement le user à chq fois que je récup un msg
    protected $fillable = ['product_id','user_id','comment','rating'];

    // nom de la fonction au singulier car 1 seul user en relation 
    // cardinalité 1,1

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
