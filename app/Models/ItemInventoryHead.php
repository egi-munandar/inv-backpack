<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemInventoryHead extends Model
{
    use HasFactory;
    protected $fillable = [
        'source',
        'unique_id',
        'description',
        'user_id',
    ];
    /**
     * Get all of the dets for the ItemInventoryHead
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dets(): HasMany
    {
        return $this->hasMany(ItemInventoryDet::class, 'head_id');
    }
}
