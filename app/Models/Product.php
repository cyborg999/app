<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="product";
    protected $fillable = ["name", "description", "srp", "orig", "qty", "user_id", "barcode", "active", "discount_ids", "category_id"];
}
