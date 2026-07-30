<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class Privileges extends Model
{
    use SoftDeletes;
    use Uuid;

    protected $table = "ms_privilege";
    protected $dates = ['deleted_at'];
    public $incrementing = false;
    protected $primaryKey = 'id';

    function user(){
        return $this->hasMany("App\User",'level','id');
    }
}
