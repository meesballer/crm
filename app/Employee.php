<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{

use softDeletes;


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
