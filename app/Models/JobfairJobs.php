<?php

// namespace Cms\Jobfair\Models;
namespace App\Models;


// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Cms\Jobs\Models\Jobs
 *
 * @mixin \Eloquent
 */
// class Jobs extends Eloquent
class JobfairJobs extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobfair_jobs';

    /**
     * @var array
     */
    protected $fillable = [
            'id',
            'jobfair_company_id',
            'name',
            'penempatan',
            'desc',
            'uuid',
            'status',
            'created_at',
            'updated_at',
            'user_by',
            'deleted_at',
            'sort',
            'event_id',
            'img_pic',
            'categorie_id',
            'career_level',
            'qualification',
            'year_experience',
            'job_type',
        
    ];

    public function cat()
    {
        return $this->belongsTo(\App\Models\Categorie::class, 'categorie_id');
    }
    
    public function categorie()
    {
        return $this->belongsTo(\App\Models\Categorie::class, 'categorie_id');
    }
    
    public function company()
    {
        return $this->belongsTo(\App\Models\JobfairCompany::class, 'jobfair_company_id');
    }
    
    public function catLike()
    {
        $cat = (json_decode($this->categorie_id)) ? json_decode($this->categorie_id) : [];
        // $cat = ( is_array($cat) ) ? array_values($cat) : [];
        return  \App\Models\Categorie::whereIn('id', $cat )
            ->where('status', 1)->whereNull('deleted_at')
            ->get();
    }
}
