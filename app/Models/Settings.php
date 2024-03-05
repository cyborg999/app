<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = ["tin", "dti", "logo", "mobile", "email", "website", "about"];
    protected $table = "settings";
}
