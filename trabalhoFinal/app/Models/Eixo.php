<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eixo extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome'];

    public function cursos()  {
        return $this-> hasMany(CURSO::class, "eixo_id" , "id");
    }
    public function professores()  {
        return $this-> hasMany(PROFESSOR::class, "eixo_id" , "id");
    }
}