<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseDetail extends Model
{
    use HasFactory;

    protected $fillable = ['expense_type_id', 'price'];

    // Relationship with ExpenseType
    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class);
    }
}
