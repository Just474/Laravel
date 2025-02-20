<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @mixin \Eloquent
 */
class Product extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
