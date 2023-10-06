<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    const AVAILABLE = true;
    const UNAVAILABLE = false;

    public function isAvailable()
    {
    	return $this->status = Report::AVAILABLE;
    }
}
