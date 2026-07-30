<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuid;



class CategoryPortofolio extends Model

{

    use SoftDeletes;

    use Uuid;



    protected $table = "tb_category_portofolio";

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    protected $primaryKey = 'id_category_portofolio';

    public function portofolio()
    {
        return $this->hasOne('\App\Models\Portofolio', 'catport_portofolio', 'id_category_portofolio');
    }

}

