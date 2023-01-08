<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAbuse extends Model
{
    public function creator()
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function reporter()
    {
        return $this->belongsTo(Customer::class, 'reported_id', 'id');
    }
}
