<?php

namespace App;

use App\User;
use App\Service;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
    	'name',
    	'car_number',
    	'car_manager_id'
    ];

    public function carManager()
    {
    	return $this->belongsTo(User::class);
    }

    public function services()
    {
    	return $this->belongsToMany(Service::class);
    }
}
