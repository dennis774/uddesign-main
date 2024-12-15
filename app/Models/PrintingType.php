<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrintingType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(PrintingCategory::class, 'printing_category_id');
    }

    public function printingDetails()
    {
        return $this->hasMany(PrintingDetails::class);
    }
}
