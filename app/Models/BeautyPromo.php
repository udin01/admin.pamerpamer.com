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
 * Cms\BeautyPromo\Models\BeautyPromo
 *
 * @mixin \Eloquent
 */
// class BeautyPromo extends Eloquent
class BeautyPromo extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_beauty_promo';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'uuid',
        'klinik_id',
        'code',
        'desc',
        'note',
        'type_promo',
        'val_promo',
        'img_pic',
        'user_by',
        'type',
        'sort',
        
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
}
