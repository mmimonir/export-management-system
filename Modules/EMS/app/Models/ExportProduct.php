<?php

namespace Modules\EMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExportProduct extends Model
{
    protected $table = 'export_products';

    protected $fillable = [
        'category_id',
        'name_bangla',
        'name_bangla_display',
        'name_banglish',
        'name_english_with_bangla',
        'name_english',
        'name_english_display',
        'botanical_name',
        'hs_code',
        'unit_price',
        'currency',
        'slug',
        'is_active',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'unit_price' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
