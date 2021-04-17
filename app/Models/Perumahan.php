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
 * Cms\Perumahan\Models\Perumahan
 *
 * @mixin \Eloquent
 */
// class Perumahan extends Eloquent
class Perumahan extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_perumahan';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'status',
        'developer_id',
        'prolog',
        'desc',
        'note',
        'telp',
        'img_pic',
        'img_pic_dark',
        'img_list',
        'img_booth',
        'location',
        'glocation',
        'sosmed',
        'siteplan',
        'brosur',
        'profil_video',
        'user_by',
        
    ];
    
    // public function save(array $options = [])
    // {
    //     if( Auth::user() ){
    //         $this->user_by = Auth::user()->id;
    //     }

    //      if( is_array($this->sosmed) ){
    //         $this->sosmed =  json_encode($this->sosmed); 
    //     }  else {
    //         $this->sosmed = $this->sosmed;
    //     }

    //     parent::save();
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_by');
    // }
    public function dev()
    {
        return $this->belongsTo(\App\Models\Developer::class, 'developer_id');
    }
    public function marketing()
    {
    
        $dt = Carbon::now();
        $dt->toTimeString();
        // if($_SERVER['REMOTE_ADDR'] === '202.80.216.49' ){
        //     dump($dt->toTimeString());
        // }
        return $this->hasMany(\App\Models\Marketing::class, 'perumahan_id')
            ->whereTime('start_show','<=', $dt->toTimeString() )
            ->whereTime('end_show','>=', $dt->toTimeString() )
            ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function marketingAll()
    {
        return $this->hasMany(\App\Models\Marketing::class, 'perumahan_id')
                ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

}
