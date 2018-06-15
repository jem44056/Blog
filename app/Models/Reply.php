<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'replies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'body'];

    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function post(){

        return $this->belongsTo('App\Models\Post');
    }

    
}
