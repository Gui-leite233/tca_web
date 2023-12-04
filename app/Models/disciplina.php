<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\turma;


class disciplina extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(Turma::class);
    }

}
