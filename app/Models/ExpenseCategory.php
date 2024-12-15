<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpenseCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function types()
    {
        return $this->hasMany(ExpenseType::class);
    }
}
