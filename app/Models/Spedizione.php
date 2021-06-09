<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spedizione extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'numericSenderReference',
        'alphanumericSenderReference',
        'parcelID',
        'etichetta'     
        
    ];
}
