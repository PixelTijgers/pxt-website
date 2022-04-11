<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    /**
     * Traits
     *
     */
    use HasRoles;

    protected $fillable = [
        'name',
    ];
}
