<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'payment_method_id',
        'shipping_address',
        'total_price',
        'staus'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
}
