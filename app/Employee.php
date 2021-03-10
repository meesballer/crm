<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'company_id',
        'user_id',
        'role_id'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
