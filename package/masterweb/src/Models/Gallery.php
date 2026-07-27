<?php



namespace Smt\Masterweb\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Smt\Masterweb\Traits\Uuid;



class Gallery extends Model

{

    use SoftDeletes;

    use Uuid;



    protected $table = "tb_photo";

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    protected $primaryKey = 'id';

    public function album()
    {
        return $this->hasOne('\Smt\Masterweb\Models\Album', 'id', 'id_photoalbum');
    }

}

