<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'titulo',
        'isbn',
        'anio_publicacion',
        'paginas',
        'disponible',
        'autor_id'
    ];

    //Desbloquear en la comparacion en vista para ver si da 1 y 0, o true o false

    // public function casts(): array
    // {
    //     return [
    //         'disponible' => 'boolean',
    //     ];
    // }

    public function autor(){
        return $this->belongsTo(Autor::class);
    }
}
