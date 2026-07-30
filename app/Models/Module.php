<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class Module extends Model
{
    use SoftDeletes;
    use Uuid;

    protected $table = "ms_module";
    protected $dates = ['deleted_at'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
