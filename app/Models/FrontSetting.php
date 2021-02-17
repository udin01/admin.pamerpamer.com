<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class FrontSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'datafront_setting';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['id', 'key', 'value', 'type', 'label', 'created_at', 'otherarray', 'otherclass' ];

    public function save(array $options = [])
    {
        $this->created_at = \Carbon::now();
        parent::save();
    }
}
