<?php

// namespace Cms\Expoproperty\Models;
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
 * Cms\BeautyCategoriProduct\Models\BeautyCategoriProduct
 *
 * @mixin \Eloquent
 */
// class BeautyCategoriProduct extends Eloquent
class BeautyCategoriProduct extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_beauty_categori_product';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'icon',
        'img',
        'seo_title_en',
        'seo_description_en',
        'seo_keywords_en',
        'seo_url_slug_en',
        'user_by',
        'uuid',
        'type',
        
    ];
    public function save(array $options = [])
    {
        // if( Auth::user() ){
        //     $this->user_by = Auth::user()->id;
        //     $this->seo_title_en = Str::slug( $this->name );
        //     $this->seo_url_slug_en = Str::slug( $this->name );
         
        //     if (parent::where('seo_url_slug_en', $this->seo_url_slug_en )->where('id', '<>',$this->id )->exists() ) {
        //         $this->seo_url_slug_en = $this->seo_url_slug_en.'-'.Carbon::now()->format('Ymd-His');
        //     }
        // }


        parent::save();
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_by');
    // }

    public function allProduct()
    {
        return $this->hasMany(\App\Models\BeautyProduct::class, 'categorie_product_id')
                ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function product()
    {
        return $this->hasMany(\App\Models\BeautyProduct::class, 'categorie_product_id')
                ->where('status', 1)->where('type_product', 'barang')->whereNull('deleted_at');
                // ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
    
    public function layanan()
    {
        return $this->hasMany(\App\Models\BeautyProduct::class, 'categorie_product_id')
                ->where('status', 1)->where('type_product', 'jasa')->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}
