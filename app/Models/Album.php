<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuid;



class Album extends Model

{

    use SoftDeletes;

    use Uuid;



    protected $table = "tb_photoalbum";

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    protected $primaryKey = 'id';

    public function gallery()
    {
        return $this->hasOne('\App\Models\Gallery', 'id_photoalbum', 'id');
    }

    public function galleries()
    {
        return $this->hasMany('\App\Models\Gallery', 'id_photoalbum', 'id');
    }

}

