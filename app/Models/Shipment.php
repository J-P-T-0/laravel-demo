<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipment';

    protected $fillable = [
        'user_id',
        'address',
        'postal_code',
        'state',
        'city',
        'country_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
