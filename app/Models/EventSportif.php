<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventSportif extends Model
{
    use HasFactory;

    /** @use HasFactory<\Database\Factories\EventSportifFactory> */

    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (EventSportif $event) {
            $event->slug = Str::slug($event->name);
        });
    }
    public function organizer()
{
return $this->belongsTo(User::class);
}
public function categories()
    {
        return $this->hasMany(Categorie::class);
    }
    public function athletes()
    {
        return $this->hasManyThrough(Athlete::class,Categorie::class);
    }
    public function comments()
{
return $this->morphMany(Comment::class,'commentable');
}
public function logo()
    {
        return $this->morphOne(Photo::class,'photoable');
    }

    public function poster()
    {
        return $this->morphOne(Photo::class,'photoable');
    }
}
