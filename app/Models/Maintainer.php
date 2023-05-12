<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Maintainer extends Model
{
    use HasFactory;    public $table = 'maintainers';

    public $fillable = [
        'name',
        'email',
        'phone_number'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone_number' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function domains()
    {
        return $this->belongsToMany(Domain::class)->withTimestamps();
    }
}
