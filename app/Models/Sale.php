<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'invoice_number',
        'amount',
        'status',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}