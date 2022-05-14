<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\Permission\Traits\HasRoles;

class InvoiceRule extends Model
{
    /**
     * Traits
     *
     */
     use HasFactory;
     use HasRoles;

     /**
      * The attributes that are mass assignable.
      *
      * @var string[]
      */
     protected $fillable = [
         'id',
         'invoice_id',
         'description',
         'price',
         'amount',
     ];
}
