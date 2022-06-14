<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Samithi extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'district_id'
    ];

    /**
     * Get the addresses for the samithi.
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    /**
     * Get the district for the samithi.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
