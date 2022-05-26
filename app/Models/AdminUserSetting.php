<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUserSetting extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'name',
        'value',
        'previous_value',
    ];

    /**
     * Belongs to admin
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
