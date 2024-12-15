<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(MerchCategory::class, 'merch_category_id');
    }

    public function merchDetails()
    {
        return $this->hasMany(MerchDetails::class);
    }
}
