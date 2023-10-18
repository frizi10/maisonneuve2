<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BologPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'title_fr',
        'body_fr',
       
    ];

    public function blogHasUser(){
        return $this->hasone('App\Models\User','id','user_id');
    }
    // public function blogHasCategory(){
    //     return $this->hasone('App\Models\Category','id','category_id');
    // }
}
