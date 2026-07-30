<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuid;



class CategoryLayanan extends Model

{

    use SoftDeletes;

    use Uuid;



    protected $table = "tb_category_layanan";

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    protected $primaryKey = 'id_category_layanan';

    public function layanan()
    {
        return $this->hasOne('\App\Models\Layanan', 'kategori', 'id_category_layanan');
    }

}

