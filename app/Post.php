<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = 'posts';
    //Database key
    public $primaryKey='id';
    //TimeStamps
    public $timestamps=true;

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
