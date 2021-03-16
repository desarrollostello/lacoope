<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;
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

    public function autorizePopup($request)
    {
        $publicado = Popup::where('status', 2)->first();
        $status = (int) $request->status;
        
        if($publicado && $status === 2)
        {
            $datestart = Carbon::parse($request->start_date)->format('Y-m-d');
            $dateend   = Carbon::parse($request->end_date)->format('Y-m-d');

            $existente_datestart = Carbon::parse($publicado->start_date)->format('Y-m-d');
            $existente_dateend   = Carbon::parse($publicado->end_date)->format('Y-m-d');

            if(
            ($datestart >= $existente_datestart && $datestart <= $existente_dateend)
            || ($dateend >= $existente_datestart && $dateend <= $existente_dateend)
            || ($datestart < $existente_datestart && $dateend > $existente_dateend)
            )
            {
                return false;
            }
        }
        return true;
    }

    public function autorizeChangeStatus($request)
    {
        dd($request);
        
        $publicado = Popup::where('status', 2)->first();
        $status = (int) $request->status;
        
        if($publicado && $status === 2)
        {
            $datestart = Carbon::parse($request->start_date)->format('Y-m-d');
            $dateend   = Carbon::parse($request->end_date)->format('Y-m-d');

            $existente_datestart = Carbon::parse($publicado->start_date)->format('Y-m-d');
            $existente_dateend   = Carbon::parse($publicado->end_date)->format('Y-m-d');

            if(
            ($datestart >= $existente_datestart && $datestart <= $existente_dateend)
            || ($dateend >= $existente_datestart && $dateend <= $existente_dateend)
            || ($datestart < $existente_datestart && $dateend > $existente_dateend)
            )
            {
                return false;
            }
        }
        return true;
    }
}
