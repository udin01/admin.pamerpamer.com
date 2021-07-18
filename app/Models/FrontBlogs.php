<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title_en
 * @property string $details_en
 * @property string $expire_date
 * @property string $icon
 * @property boolean $status
 * @property int $visits
 * @property int $categories_id
 * @property string $seo_title_en
 * @property string $seo_description_en
 * @property string $seo_keywords_en
 * @property string $seo_url_slug_en
 * @property string $tags
 * @property int $user_by
 * @property string $created_at
 * @property string $updated_at
 */
class FrontBlogs extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'datafront_blogs';

    /**
     * @var array
     */
    protected $fillable = [
        'title_en', 
        'details_en', 
        'expire_date', 
        'icon', 
        'status', 
        'visits', 
        'categories_id', 
        'seo_title_en', 
        'seo_description_en', 
        'seo_keywords_en', 
        'seo_url_slug_en', 
        'user_by', 
        'created_at', 
        'updated_at', 
        'image_pic'
    ];

}
