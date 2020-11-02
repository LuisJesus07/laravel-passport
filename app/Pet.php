<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'client_id',
    ];

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
}
