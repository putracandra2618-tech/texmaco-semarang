<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuid;



class Portofolio extends Model

{

    use SoftDeletes;

    use Uuid;



    protected $table = "tb_portofolio";

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    protected $primaryKey = 'id_portofolio';

    public function category_portofolio()
    {
        return $this->hasOne('\App\Models\CategoryPortofolio', 'id_category_portofolio', 'catport_portofolio');
    }

}

