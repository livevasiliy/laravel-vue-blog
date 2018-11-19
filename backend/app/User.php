<?php

namespace App;

use Illuminate\Support\Facades\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

<<<<<<< HEAD

    /***
     * @var array
     */
=======
>>>>>>> 383e9099c4ccf962941f6a073d574d3aeb1d6102
    protected $appends = ['avatar_url'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
<<<<<<< HEAD
    public function articles () {
    	return $this->hasMany (Article::class);
	}

    /***
     *
     * Get download URL to avatar user
=======
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /***
     *
     * Return download URL to avatar
>>>>>>> 383e9099c4ccf962941f6a073d574d3aeb1d6102
     *
     * @return mixed
     */
    public function getAvatarUrlAttribute()
    {
<<<<<<< HEAD
        return asset(Storage::url('avatars/'.$this->id.'/'.$this->avatar));
=======
        $file = Storage::url('avatars/' . $this->id . '/' . $this->avatar);
        return asset($file);
>>>>>>> 383e9099c4ccf962941f6a073d574d3aeb1d6102
    }
}
