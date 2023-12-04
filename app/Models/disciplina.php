<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\turma;

$turma = Turma::find(1);
class disciplina extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(Turma::class);
    }
    foreach ($turma->disciplinas as $disciplina) {
        echo $role->pivot->created_at;
    }
}
