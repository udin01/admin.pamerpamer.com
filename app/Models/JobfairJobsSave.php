<?php

// namespace Cms\Jobfair\Models;
namespace App\Models;


// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Cms\Jobs\Models\Jobs
 *
 * @mixin \Eloquent
 */
// class Jobs extends Eloquent
class JobfairJobsSave extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobfair_job_save';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'jobfair_jobs_id',
        'jobfair_user_id',
        'uuid',
        'status',
        'desc',
        'created_at',
        'updated_at',
        'user_by',
        'deleted_at',
        'event_id',
    ];

    public function save(array $options = [])
    {
        if(!$this->id){
            $this->uuid = (string) Str::uuid();
            if( Auth::user() ){
                $this->user_by = Auth::user()->id;
            }
        }
        parent::save();
    }
    
    public function job()
    {
        return $this->belongsTo(\App\Models\JobfairJobs::class, 'jobfair_jobs_id');
    }
    
    // public function catLike()
    // {
    //     $cat = (json_decode($this->categorie_id)) ? json_decode($this->categorie_id) : [];
    //     // $cat = ( is_array($cat) ) ? array_values($cat) : [];
    //     return  \App\Models\Categorie::whereIn('id', $cat )
    //         ->where('status', 1)->whereNull('deleted_at')
    //         ->get();
    // }
}
