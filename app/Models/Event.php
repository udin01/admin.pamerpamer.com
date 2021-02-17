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
 * Cms\Event\Models\Event
 *
 * @mixin \Eloquent
 */
// class Event extends Eloquent
class Event extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_event';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'status',
        'tema',
        'speaker',
        'desc',
        'note',
        'url_video',
        'start_event',
        'end_event',
        'img_pic',
        'user_by',
        
    ];
    
    // public function save(array $options = [])
    // {
    //     if( Auth::user() ){
    //         $this->user_by = Auth::user()->id;
    //     }
    //     parent::save();
    // }

    public function comment()
    {
        // $dt = Carbon::now();
        // $dt->toTimeString();
        return $this->hasMany(\App\Models\Comment::class, 'event_id')
            ->where('status', 1)->whereNull('deleted_at')->orderBy('created_at', 'asc');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_by');
    // }

}
