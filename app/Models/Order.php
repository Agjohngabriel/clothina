<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city', 'billing_state', 'billing_country', 'billing_postalcode', 'billing_phone', 'billing_name_on_card', 'billing_discount', 'billing_discount_code', 'billing_subtotal', 'billing_total', 'error'
    ];	
    public function user()
    {
    	return $this->BelongsTo('App\Models\User');
    }

    public function products()
    {
    	return $this->BelongsToMany('App\Models\Product')->withPivot('quantity');
    }
}
