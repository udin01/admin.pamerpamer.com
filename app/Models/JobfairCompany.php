<?php

// namespace Cms\Jobfair\Models;
namespace App\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Cms\Company\Models\Company
 *
 * @mixin \Eloquent
 */
// class Company extends Eloquent
class JobfairCompany extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobfair_company';

    /**
     * @var array
     */
    protected $fillable = [
         'id',
        'name',
        'alamat',
        'variable',
        'link',
        'visible',
        'uuid',
        'status',
        'desc',
        'created_at',
        'updated_at',
        'user_by',
        'deleted_at',
        'img_pic',
        'img_booth',
        'event_id',
        'sort',
        'profil_video',
        'sosmed',
        'img_list',
        'company_size',
        'dress_code',
        'spoken_language',
        'work_hours',
        'benefits',
        
    ];
    
    public function jobs()
    {
    
        // if($_SERVER['REMOTE_ADDR'] === '202.80.216.49' ){
        //     dump($dt->toTimeString());
        // }
        $kontenHome = \App\Models\KontenHome::where('key', 'event_aktif')->first();

        return $this->hasMany(\App\Models\JobfairJobs::class, 'jobfair_company_id')
            ->where('event_id',  $kontenHome->value )
            ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}
