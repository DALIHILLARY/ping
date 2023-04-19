<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Domain extends Model
{
    use HasFactory;    public $table = 'domains';

    const STATUS_UP = 200;
    const STATUS_DOWN = 0;
    const STATUS_SSL_ERROR = -1;


    public $fillable = [
        'name',
        'url',
        'enabled'
    ];

    protected $casts = [
        'name' => 'string',
        'url' => 'string',
        'enabled' => 'boolean'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'url' => 'required|url|unique:domains|max:255',
        'enabled' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

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

    public function logs()
    {
        return $this->hasMany(MonitorLog::class);
    }

    public function latestLog()
    {
        return $this->hasOne(MonitorLog::class)->latestOfMany();
    }
}
