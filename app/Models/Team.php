<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Team extends Model
{
    use HasFactory;    public $table = 'teams';

    public $fillable = [
        'name',
        'email',
        'domain_id',
        'contact_number'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'contact_number' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'domain_id' => 'required',
        'contact_number' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function domain(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Domain::class, 'domain_id');
    }
}
