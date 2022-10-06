<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'description',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres')->withTimestamps();
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actors')->withTimestamps();
    }

    protected function shortDescription(): Attribute
    {
        return Attribute::make(get: function ($value, $attributes) {
            return mb_strcut($attributes['description'], 0, 30).'...';
        });
    }
}
