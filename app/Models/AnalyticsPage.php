<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AnalyticsVisitor as AnalyticsVisitor;

class AnalyticsPage extends Model
{
    protected $table = 'datafront_analytics_pages';

    /**
     * @var array
     */
    protected $fillable = [
					'visitor_id',
					'ip',
					'title',
					'name',
					'query',
					'load_time',
					'date',
					'time',
					'created_at',
					'updated_at'
				];

    public function visitor()
    {

        return $this->belongsTo(AnalyticsVisitor::class, 'visitor_id')->orderby('id', 'desc');
    }
}