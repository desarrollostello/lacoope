<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Support\Str;

class Popup extends Model
{
    use HasFactory;
    use FormAccessible;

    protected $dates = ['start_date', 'end_date'];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    protected $fillable = [
        'name',
        'slug',
        'title',
        'text',
        'start_date',
        'end_date',
        'visualizations',
        'status',
        'file',
        'url',
        'user_id',
    ];


    public function setStartDateAttribute($val)
    {
        $this->attributes['start_date'] = \Carbon\Carbon::parse($val)->format('Y-m-d');
    }

    public function getStartDateAttribute($val)
    {
        return \Carbon\Carbon::parse($val)->format('d-m-Y');
    }

    public function formStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function setEndDateAttribute($val)
    {
        $this->attributes['end_date'] = \Carbon\Carbon::parse($val)->format('Y-m-d');
    }

    public function getEndDateAttribute($val)
    {
        return \Carbon\Carbon::parse($val)->format('d-m-Y');
    }

    public function formEndDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    // relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
