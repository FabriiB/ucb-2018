<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    protected $table = 'user_plan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_person',
        'id_plan',
        'start_date_plan',
        'ending_date_plan',
    ];
}
