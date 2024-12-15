<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchDetails extends Model
{
    use HasFactory;

    protected $fillable = ['merch_type_id', 'pcs'];

    // Correctly named relationship with MerchType
    public function merchType()
    {
        return $this->belongsTo(MerchType::class);
    }
}
