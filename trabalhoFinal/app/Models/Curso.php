<?php

namespace App\Models;

use Illuminate\Database\Eloquent\softDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    use softDeletes;

    protected $table = "cursos";
    
    protected $fillable = ['nome','sigla','tempo','eixo'];
}
