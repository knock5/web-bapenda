<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $primaryKey = 'restaurant_id';
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'phone',
        'address',
        'opening_hours',
        'closing_hours',
        'revenue',
        'tax_rate',
        'tax_id_number',
        'tax_due_date',
        'last_tax_payment',
        'is_tax_paid',    
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
