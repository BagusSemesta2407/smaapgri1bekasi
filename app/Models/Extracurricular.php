<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Extracurricular extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the categoryExtracurricular that owns the Extracurricular
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryExtracurricular(): BelongsTo
    {
        return $this->belongsTo(categoryExtracurricular::class);
    }

    /**
     * Get all of the imageExtracurricular for the Extracurricular
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageExtracurricular(): HasMany
    {
        return $this->hasMany(imageExtracurricular::class);
    }
    

   

    public function scopeFilter($query, object $filter)
    {
        $query->when($filter->category_extracurricuar_id ?? false, fn ($query, $category_extracurricuar_id) => $query->where('category_extracurricuar_id', $category_extracurricuar_id));
    }
}
