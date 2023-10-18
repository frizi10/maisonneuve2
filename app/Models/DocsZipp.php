<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DocsZipp extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_fr',
        'path',
        'user_id',
       
    ];

    
    static public function docsTranslationSelect() {
        $lang = session()->get('localeDB');
    
        return self::select('id', 'title', 'user_id','path',
            DB::raw("CASE WHEN title$lang IS NULL THEN title ELSE title$lang END as title"))
            ->orderBy('title')
            ;
    }
    

    public function docHasUser(){
        return $this->hasone('App\Models\User','id','user_id');
    }
}
