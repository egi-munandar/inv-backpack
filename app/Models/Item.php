<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'item_name',
        'description',
        'uom'
    ];
    /**
     * Get all of the invs for the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invs(): HasMany
    {
        return $this->hasMany(ItemInventoryDet::class, 'item_id');
    }
}
