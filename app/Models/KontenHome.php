<?php

namespace App\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Cms\KontenHome\Models\KontenHome
 *
 * @mixin \Eloquent
 */
// class KontenHome extends Eloquent
class KontenHome extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_konten_home';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'key',
        'type',
        'label',
        'value',
        'otherarray',
        'otherclass',
        
    ];
}
