<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'address_line_1',
        'address_line_2',
        'district',
        'city',
        'postal_code',
    ];

    /**
     * Get the parent addressable model
     */
    public function addressable()
    {
        return $this->morphTo();
    }
}
