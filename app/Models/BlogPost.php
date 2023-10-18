<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BlogPost extends Model
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

        static public function blogTranslationSelect() {
            $lang = session()->get('localeDB');
        
            return self::select('id', 'body', 'user_id',
                DB::raw("CASE WHEN title$lang IS NULL THEN title ELSE title$lang END as title"),
                DB::raw("CASE WHEN body$lang IS NULL THEN body ELSE body$lang END as body"))
                ->orderBy('title')
                ->get();
        }
        

    static public function blogTranslationSelectByID($myId) {

        $lang = session()->get('localeDB');
    
        return self::select('id', 'body', 'user_id',
            DB::raw("CASE WHEN title$lang IS NULL THEN title ELSE title$lang END as title"),
            DB::raw("CASE WHEN body$lang IS NULL THEN body ELSE body$lang END as body"))
            ->where('id', $myId)
            ->first();
    }
}
