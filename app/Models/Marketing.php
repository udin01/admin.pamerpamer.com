<?php

namespace App\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Cms\Base\Traits\Uuid;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Cms\Marketing\Models\Marketing
 *
 * @mixin \Eloquent
 */
// class Marketing extends Eloquent
class Marketing extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_marketing';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'status',
        'perumahan_id',
        'desc',
        'note',
        'telp',
        'wa',
        'img_pic',
        'user_by',
        'start_show',
        'end_show',
        'klinik_id'
        
    ];

    // public function save(array $options = [])
    // {
    //     if( Auth::user() ){
    //         $this->user_by = Auth::user()->id;
    //     }

    //     parent::save();
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_by');
    // }
    public function perumahan()
    {
        return $this->belongsTo(\App\Models\Perumahan::class, 'perumahan_id');
    }
    
    public function klinik()
    {
        return $this->belongsTo(\App\Models\BeautyKlinik::class, 'klinik_id');
    }
}
