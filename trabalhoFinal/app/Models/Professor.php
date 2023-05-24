<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    
    protected $table = "professores";
    
    protected $fillable = ['nome','eixo','ativo','email','siape'];
}
