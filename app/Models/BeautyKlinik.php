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
 * Cms\BeautyKlinik\Models\BeautyKlinik
 *
 * @mixin \Eloquent
 */
// class BeautyKlinik extends Eloquent
class BeautyKlinik extends Model
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_beauty_klinik';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'uuid',
        'prolog',
        'desc',
        'note',
        'telp',
        'img_pic',
        'img_list',
        'img_booth',
        'location',
        'glocation',
        'sosmed',
        'user_by',
        'sort',
        'categorie_id',
        'profil_video'
        
    ];

    public function save(array $options = [])
    {
        // if( Auth::user() ){
        //     $this->user_by = Auth::user()->id;
        // }
        // if(!$this->id){
        //     $this->type = env('TYPE_EXPO', 'property');
        // }
        
       if( is_array($this->sosmed) ){
            $this->sosmed =  json_encode($this->sosmed); 
        }  else {
            $this->sosmed = $this->sosmed;
        }

        parent::save();
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_by');
    // }
    
    public function cabang()
    {
        return $this->hasMany(\App\Models\BeautyCabKlinik::class, 'klinik_id')
                ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
    
    public function productAll()
    {
        return $this->hasMany(\App\Models\BeautyProduct::class, 'klinik_id')
                ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
    
    public function product()
    {
        return $this->hasMany(\App\Models\BeautyProduct::class, 'klinik_id')
                ->where('status', 1)->where('type_product', 'barang')->whereNull('deleted_at');
                // ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
    
    public function layanan()
    {
        return $this->hasMany(\App\Models\BeautyProduct::class, 'klinik_id')
                ->where('status', 1)->where('type_product', 'jasa')->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
    
    public function pegawai()
    {
        return $this->hasMany(\App\Models\BeautyPegawai::class, 'klinik_id')
                ->where('status', 1)->where('department', 'dokter')->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
    
    public function marketing()
    {
    
        $dt = Carbon::now();
        $dt->toTimeString();
        // if($_SERVER['REMOTE_ADDR'] === '202.80.216.49' ){
        //     dump($dt->toTimeString());
        // }
        return $this->hasMany(\App\Models\Marketing::class, 'klinik_id')
            ->whereTime('start_show','<=', $dt->toTimeString() )
            ->whereTime('end_show','>=', $dt->toTimeString() )
            ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function marketingAll()
    {
        return $this->hasMany(\App\Models\Marketing::class, 'klinik_id')
                ->where('status', 1)->whereNull('deleted_at');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}
