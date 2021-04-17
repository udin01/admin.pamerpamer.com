<?php

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
 * Cms\Developer\Models\Developer
 *
 * @mixin \Eloquent
 */
// class Developer extends Eloquent
class Developer extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_developer';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'status',
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
}
