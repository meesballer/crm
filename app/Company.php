<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'address',
        'website',
        'user_id',
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee', 'company_id');
    }
}
