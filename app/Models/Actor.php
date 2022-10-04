<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'date_of_birth',
        'heigth',
    ];

    protected $dates = [
        'date_of_birth',
    ];
}
