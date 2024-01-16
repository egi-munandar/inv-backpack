<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemInventoryDet extends Model
{
    use HasFactory;
    protected $fillable = [
        'head_id',
        'item_id',
        'location_id',
        'qty',
        'note',
        'date',
    ];
    /**
     * Get the item that owns the ItemInventoryDet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    /**
     * Get the item that owns the ItemInventoryDet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    /**
     * Get the item that owns the ItemInventoryDet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function head(): BelongsTo
    {
        return $this->belongsTo(ItemInventoryHead::class, 'head_id');
    }
}
