<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $primaryKey = 'hotel_id';
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'phone',
        'address',
        'rating',
        'amenities',
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
}
