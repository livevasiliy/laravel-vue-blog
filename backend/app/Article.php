<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    protected $fillable = [
        'title',
        'body'
	];
 
    public function users () {
    	return $this->belongsTo('App\User');
	}
}
