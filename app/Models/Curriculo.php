<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    /** @use HasFactory<\Database\Factories\CurriculoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cargo_desejado',
        'escolaridade',
        'observacoes',
        'caminho_arquivo',
        'ip_visitante',
    ];
}
