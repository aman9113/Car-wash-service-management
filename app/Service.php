<?php

namespace App;

use App\Car;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'amount'
    ];

    public function cars()
    {
    	return $this->belongsToMany(Car::class);
    }
}
