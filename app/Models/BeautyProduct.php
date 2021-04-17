<?php

// namespace Cms\Expoproperty\Models;
namespace App\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Cms\Base\Traits\Uuid;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
// use Cms\ACL\Models\User as User;

/**
 * Cms\BeautyProduct\Models\BeautyProduct
 *
 * @mixin \Eloquent
 */
// class BeautyProduct extends Eloquent
class BeautyProduct extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_beauty_product';

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'klinik_id',
        'name',
        'prolog',
        'desc',
        'note',
        'status',
        'harga',
        'img_pic',
        'img_list',
        'sosmed',
        'siteplan',
        'brosur',
        'profil_video',
        'created_at',
        'updated_at',
        'user_by',
        'deleted_at',
        'img_pic_dark',
        'img_booth',
        'categorie_product_id',
        'is_booth',
        'type',
        'sort',
        'price_disk',
        'type_product',
        
    ];
    public function save(array $options = [])
    {
        // if( Auth::user() ){
        //     $this->user_by = Auth::user()->id;
        // }
        // if(!$this->id){
        //     $this->type = env('TYPE_EXPO', 'property');
        // }
        
       /*
       if( is_array($this->sosmed) ){
            $this->sosmed =  json_encode($this->sosmed); 
        }  else {
            $this->sosmed = $this->sosmed;
        }
        */

        parent::save();
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_by');
    // }
    
    public function klinik()
    {
        return $this->belongsTo(\App\Models\BeautyKlinik::class, 'klinik_id');
    }
    
    public function cat()
    {
        return $this->belongsTo(\App\Models\BeautyCategoriProduct::class, 'categorie_product_id');
    }
    
    public function categorie()
    {
        return $this->belongsTo(\App\Models\BeautyCategoriProduct::class, 'categorie_product_id');
    }
}
