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
 * Cms\JobApply\Models\JobApply
 *
 * @mixin \Eloquent
 */
// class JobApply extends Eloquent
class JobfairJobApply extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobfair_job_apply';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'jobfair_jobs_id',
        'jobfair_user_id',
        'surat_lamaran',
        'tgl_melamar',
        'jam_melamar',
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
}
