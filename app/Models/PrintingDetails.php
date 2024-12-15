<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrintingDetails extends Model
{
    use HasFactory;

    protected $fillable = ['merch_type_id', 'quantity'];

    // Correctly named relationship with MerchType
    public function printingType()
    {
        return $this->belongsTo(PrintingType::class);
    }
}
