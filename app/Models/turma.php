<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class turma extends Model
{
    use HasFactory;

    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(turma::class);
    }
}
