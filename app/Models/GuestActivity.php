<?php

namespace App\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Cms\GuestActivity\Models\GuestActivity
 *
 * @mixin \Eloquent
 */
// class GuestActivity extends Eloquent
class GuestActivity extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_guest_activity';

    /**
     * @var array
     */
    protected $fillable = [
        'status',
        'guest_id',
        'referrer',
        'desti',
        'time',
        'action',
        'ip',
        'userAgent',
        'no',
        'note',
        
    ];
}
