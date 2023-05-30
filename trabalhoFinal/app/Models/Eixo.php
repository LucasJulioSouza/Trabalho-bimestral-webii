<?php

namespace App\Models;

use Illuminate\Database\Eloquent\softDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    use HasFactory;

    use softDeletes;

    protected $table = "eixos";
    
    protected $fillable = ['nome'];

    

}
