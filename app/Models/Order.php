<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'date',
        'locality',
        'schedule',
        'business_name',
        'customer_code',
        'payment_terms',
        'notes',
        'file_path',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber(): string
    {
        $last = static::orderBy('id', 'desc')->first();
        $next = $last ? (int) substr($last->order_number, -4) + 1 : 1;
        return 'ORD-' . str_pad((string) $next, 6, '0', STR_PAD_LEFT);
    }
}
