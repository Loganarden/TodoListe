<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'titre',
        'description',
        'date',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
