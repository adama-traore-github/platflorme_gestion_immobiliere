<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'city',
        'postal_code',
        'type',
        'surface',
        'price',
        'furnished',
        'status',
        'image',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
