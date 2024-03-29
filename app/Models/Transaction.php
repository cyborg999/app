<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    use HasFactory;

    protected $table = "transaction";
    protected $fillable = ["userid", "payment_received", "total", "payment_option"];
}
