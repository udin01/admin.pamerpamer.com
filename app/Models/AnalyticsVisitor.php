<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AnalyticsPage as AnalyticsPage;

class AnalyticsVisitor extends Model
{

    protected $table = 'datafront_analytics_visitors';

    /**
     * @var array
     */
    protected $fillable = [
				'ip',
				'city',
				'country_code',
				'country',
				'region',
				'full_address',
				'location_cor1',
				'location_cor2',
				'os',
				'browser',
				'resolution',
				'referrer',
				'hostname',
				'org',
				'date',
				'time',
				'created_at',
				'updated_at',
				'isBot',
				'kindDevice',
				'modelDevice',
				'osDevice',
				'userAgent'

		    ];

    //Relation to AnalyticsPage
    public function vPages()
    {

        return $this->hasMany(AnalyticsPage::class,"visitor_id");
    }
}
