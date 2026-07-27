<?php



namespace Smt\Masterweb\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Smt\Masterweb\Traits\Uuid;



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
        return $this->hasOne('\Smt\Masterweb\Models\Gallery', 'id_photoalbum', 'id');
    }

    public function galleries()
    {
        return $this->hasMany('\Smt\Masterweb\Models\Gallery', 'id_photoalbum', 'id');
    }

}

