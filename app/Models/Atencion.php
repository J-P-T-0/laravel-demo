<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Atencion extends Model
{
    use HasFactory;

    protected $table = 'atencion';

    protected $fillable = ['atencion', 'calidad', 'recomendacion', 'experiencia', 'facilidad', 'comentarios'];

}
