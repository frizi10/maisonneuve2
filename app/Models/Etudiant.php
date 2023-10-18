<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'email',
        'adresse',
        'phone',
        'date_de_naissance',
        'ville_id',
        'id'

    ];

    public function studentHasCity(){

        return $this->hasone('App\Models\Ville','id','ville_id' );
    }

    //tp2
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

  
    public function userHasDocs(){
        return $this->hasMany(DocsZipp::class);
    }
   

}
