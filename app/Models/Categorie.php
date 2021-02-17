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
 * Cms\Categorie\Models\Categorie
 *
 * @mixin \Eloquent
 */
// class Categorie extends Eloquent
class Categorie extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_categorie';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'icon',
        'status',
        'img',
        'seo_title_en',
        'seo_description_en',
        'seo_keywords_en',
        'seo_url_slug_en',
        'user_by',
        
    ];
    // public function save(array $options = [])
    // {
    //     if( Auth::user() ){
    //         $this->user_by = Auth::user()->id;
    //         $this->seo_title_en = Str::slug( $this->name );
    //         $this->seo_url_slug_en = Str::slug( $this->name );
         
    //         if (parent::where('seo_url_slug_en', $this->seo_url_slug_en )->where('id', '<>',$this->id )->exists() ) {
    //             $this->seo_url_slug_en = $this->seo_url_slug_en.'-'.Carbon::now()->format('Ymd-His');
    //         }
    //     }


    //     parent::save();
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_by');
    // }
}
