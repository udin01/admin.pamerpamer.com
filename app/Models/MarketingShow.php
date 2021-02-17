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
 * Cms\MarketingShow\Models\MarketingShow
 *
 * @mixin \Eloquent
 */
// class MarketingShow extends Eloquent
class MarketingShow extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_marketing_show';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'uuid',
        'perumahan_id',
        'marketing_id',
        'desc',
        'show',
        'user_by',
        
    ];

    // public function save(array $options = [])
    // {
    //     if( Auth::user() ){
    //         $this->user_by = Auth::user()->id;
    //     }
    //     parent::save();
    // }

    // public function user() {
    //     return $this->belongsTo(User::class, 'user_by');
    // }

    public function perumahan(){
        return $this->belongsTo(\App\Models\Perumahan::class, 'perumahan_id');
    }

    public function marketing(){
        return $this->belongsTo(\App\Models\Marketing::class, 'marketing_id');
    }
}
