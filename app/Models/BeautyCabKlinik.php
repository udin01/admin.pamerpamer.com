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
 * Cms\BeautyCabKlinik\Models\BeautyCabKlinik
 *
 * @mixin \Eloquent
 */
// class BeautyCabKlinik extends Eloquent
class BeautyCabKlinik extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_beauty_klinik_cab';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'uuid',
        'prolog',
        'desc',
        'note',
        'telp',
        'img_pic',
        'img_list',
        'location',
        'glocation',
        'sosmed',
        'user_by',
        'klinik_id',
        
    ];

    public function save(array $options = [])
    {
        // if( Auth::user() ){
        //     $this->user_by = Auth::user()->id;
        // }
        // if(!$this->id){
        //     $this->type = env('TYPE_EXPO', 'property');
        // }
        if( is_array($this->sosmed) ){
            $this->sosmed =  json_encode($this->sosmed); 
        }  else {
            $this->sosmed = $this->sosmed;
        }
        parent::save();
    }
    public function klinik()
    {
        return $this->belongsTo(\App\Models\BeautyKlinik::class, 'klinik_id');
    }
}
