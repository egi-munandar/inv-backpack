<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'location_name',
        'description',
        'path',
    ];
    /**
     * Get the parent that owns the Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'parent_id', 'id');
    }
}
