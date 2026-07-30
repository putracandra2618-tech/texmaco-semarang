<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Content extends Model
{
    use Uuid;
    public $incrementing = false;
    protected $table = "tb_content";
    protected $primaryKey = 'id_content';

    public function menu()
    {
        return $this->hasOne('\App\Models\Menu', 'id', 'menu_id');
    }
}
