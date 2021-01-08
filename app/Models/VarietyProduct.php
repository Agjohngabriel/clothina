<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarietyProduct extends Model
{
    use HasFactory;
    protected $table = 'product_variety';
    protected $fillable = [
    	'product_id', 'variety_id'
    ];
}