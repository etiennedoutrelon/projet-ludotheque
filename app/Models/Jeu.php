<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table = 'jeux';

    function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class);
    }
/*
    function users(){
        return $this->belongsTo(User::class);
    }
*/
}
