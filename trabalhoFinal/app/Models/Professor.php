<?php

namespace App\Models;

use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    use HasFactory;
    
    protected $table = "professores";
    protected $fillable = ['nome','eixo','ativo','email','siape'];

   
}
