<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

// Scopes.
use App\Scopes\PublishedScope;

class Post extends Model implements HasMedia
{
    /**
     * Traits
     *
     */
    use HasFactory;
    use HasRoles;
    use InteractsWithMedia;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = [
        'slug',
        'title',
        'intro',
        'content',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'unpublished_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Model relations.
     *
     */
    public function administrator()
    {
        return $this->belongsTo(\App\Models\Administrator::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
    * Model functions.
    *
    */
    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope(new PublishedScope);
    }

    /**
     * Register the files into the database with the given collection.
     *
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('postImage')->singleFile();
    }

    /**
     * Convert the file to given height and width.
     *
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('postImage')
             ->withResponsiveImages()
             ->performOnCollections('postImage');
    }
}
