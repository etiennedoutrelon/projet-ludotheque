<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';

    function jeu() {
        return $this->belongsTo(Jeu::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}
