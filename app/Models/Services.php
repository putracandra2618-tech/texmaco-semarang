<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuid;



class Services extends Model

{

    use SoftDeletes;

    use Uuid;



    protected $table = "tb_services";

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    protected $primaryKey = 'id_service';

    
    public function ProductCategory()
    {
        return $this->hasMany('\App\Models\ProductCategory', 'service_id', 'id_productcategory');
    }

}

