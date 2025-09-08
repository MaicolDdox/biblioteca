<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Student extends Model
{
    use HasFactory, HasRoles, HasPermissions;

    protected $fillable = [
        'user_id',
        'grado'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    //----------------------
    //INFORMACION IMPORTANTE
    //----------------------

    /*
        belongsTo → lado hijo en 1:1 o 1:N (contiene la FK).

        hasMany → lado padre en 1:N.

        belongsToMany → relación N:N (requiere tabla pivot).
    */
}
