<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'sigla', 'tempo', 'eixo_id'];

    public function eixo() {
        return $this->belongsTo('\App\Models\Eixo');
    }
    public function disciplinas()  {
        return $this-> hasMany(DISCIPLINA::class, "curso_id" , "id");
    }

    public function alunos()  {
        return $this-> hasMany(ALUNO::class, "curso_id" , "id");
    }
}
