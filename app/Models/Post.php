<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'extract',
        'body',
        'status',
        'user_id',
        'category_id'
    ];

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
