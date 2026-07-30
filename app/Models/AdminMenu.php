<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
class AdminMenu extends Model
{
    protected $table = "ms_menuadm";
    use SoftDeletes;   

    
}
