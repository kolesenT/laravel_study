<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    use HasFactory;

    //говорим, что нет полей created_at updated_at
    public $timestamps = false;

    protected $table = 'login_history';

    protected $dates = [
        'enter_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
