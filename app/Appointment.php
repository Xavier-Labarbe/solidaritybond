<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_id', 'context', 'place', 'date' => 'date:d/m/Y', 'hour' => 'date:hh:mm'
    ];

    protected $dates = ['date', 'hour'];

    public function from_id()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

}
