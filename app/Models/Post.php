<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    use FormAccessible;

    protected $fillable = [
        'name',
        'published',
        'slug',
        'extract',
        'body',
        'status',
        'user_id',
    ];


    public function setPublishedAttribute($val)
    {
        $this->attributes['published'] = \Carbon\Carbon::parse($val)->format('Y-m-d');
    }

    public function getPublishedAttribute($val)
    {
        return \Carbon\Carbon::parse($val)->format('d-m-Y');
    }

    public function formPublishedAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }



    // relacion uno a muchos inversa

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    // relación muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relación uno a uno polimórfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
