<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'category_id',
        'author_id',
    ];
 
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }


}
