<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class Offer extends Model
{

    use SoftDeletes;
    use Uuid;

    protected $dates = ['deleted_at'];
    public $incrementing = false;
    protected $table = "tb_offer";
    protected $guarded = ['id'];

    public function menu()
    {
        return $this->hasOne('\App\Models\Menu', 'id', 'menu_id');
    }
}
