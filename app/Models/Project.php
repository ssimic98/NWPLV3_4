<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['ime','opis','cijena', 'obavljen','datumPocetka','datumZavrsetka'];

    public function users()
    {   
        $user_id=Auth::user()->getId();
        return $this->belongsToMany(User::class,'project_users')->wherePivot('user_id', $user_id);
    }
}
