<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
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
        'code',
        'slug',
    ];

    /**
     * Get the addresses for the district.
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function samithi()
    {
        return $this->hasMany(Samithi::class);
    }

}
