<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitorLog extends Model
{
    use HasFactory;

    const STATUS_UP = 200;
    const STATUS_DOWN = 0;
    const STATUS_SSL_ERROR = -1;

    protected $fillable = ['status_code', 'response_time', 'domain_id'];

    public function getStatusTextAttribute()
    {
        switch ($this->status_code) {
            case self::STATUS_UP:
                return 'Up';
            case self::STATUS_DOWN:
                return 'Down';
            case self::STATUS_SSL_ERROR:
                return 'SSL/TLS Error';
            default:
                return 'Unknown';
        }
    }
    
    public function domain()
    {
        return $this->belongsTo(Domainx::class);
    }
}
