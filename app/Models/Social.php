<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Social extends Model
{
    /**
     * Traits
     *
     */
    use NodeTrait;

    protected $fillable = [
        'social_media_id',
        'content',
        '_lft',
        '_rgt',
        'parent_id'
    ];

    /**
    * Model relations.
    *
    */
    public function socialmedia()
    {
        return $this->belongsTo(\App\Models\SocialMedia::class, 'social_media_id');
    }
}
