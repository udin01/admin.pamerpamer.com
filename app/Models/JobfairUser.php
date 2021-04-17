<?php

// namespace Cms\Jobfair\Models;
namespace App\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Cms\UserJobfair\Models\UserJobfair
 *
 * @mixin \Eloquent
 */
// class UserJobfair extends Eloquent
// class JobfairUser extends Model
class JobfairUser extends Authenticatable
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobfair_user';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'dob',
        'gender',
        'telp',
        'email',
        'cv',
        'cv_name_origin',
        'cv_ext',
        'cv_mimetype',
        'image',
        'institusi',
        'jurusan',
        'prodi',
        'id_kualifikasi',
        'username',
        'password',
        'id_country',
        'kode_konfirmasi',
        'status_konfirmasi',
        'status_nikah',
        'kota_asal',
        'alamat',
        'ipk',
        'fakultas',
        'uuid',
        'status',
        'desc',
        'created_at',
        'updated_at',
        'user_by',
        'deleted_at',
        'event_id',
        'tinggi',
        'berat',
        'institusi_lain',
        'jurusan_lain',
        'thn_masuk',
        'thn_lulus',
        'toefl',
        'toeic',
        'pengalaman_kerja',
        'pengalaman_organisasi',
        'pasfoto'
        
    ];
}
