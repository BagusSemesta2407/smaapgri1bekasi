<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class);
    }

    /**
     * Get all of the imageArticle for the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageArticle(): HasMany
    {
        return $this->hasMany(ImageArticle::class);
    }

    
    public function scopeFilter($query, object $filter)
    {
        $query->when($filter->category_article_id ?? false, fn ($query, $category_article_id) => $query->where('category_article_id', $category_article_id));
    }

}
