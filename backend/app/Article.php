<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    protected $fillable = [
    	'token',
		'userId'
	];
 
    public function users () {
    	return $this->belongsTo('App\User');
	}
}
