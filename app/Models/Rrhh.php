<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Rrhh extends Model
{
    use HasFactory;
    use FormAccessible;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'file',
        'slug'
    ];

    public function setCreatedAtAttribute($val)
    {
        $this->attributes['published'] = \Carbon\Carbon::parse($val)->format('Y-m-d');
    }

    public function getCreateAtAttribute($val)
    {
        return \Carbon\Carbon::parse($val)->format('d-m-Y');
    }

    public function formCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

}
