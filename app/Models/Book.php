<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'titulo',
        'autor',
        'year_publicacion',
        'estado'
    ];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
