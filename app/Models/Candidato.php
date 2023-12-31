<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'experiencia'];

    public function vagas()
    {
        return $this->belongsToMany(Vaga::class, 'candidato_vaga');
    }
}
