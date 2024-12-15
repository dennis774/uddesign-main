<?php

use App\Models\MerchDetails;
use App\Models\ExpenseDetail;
use App\Models\ExpenseCategory;
use App\Models\PrintingDetails;
// use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MerchTypeController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\MerchDetailsController;
use App\Http\Controllers\PrintingTypeController;
use App\Http\Controllers\MerchCategoryController;
use App\Http\Controllers\ExpenseDetailsController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\PrintingDetailsController;
use App\Http\Controllers\PrintingCategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/dashboard', function () {
    $expense_details = ExpenseDetail::with(['expenseType', 'expenseType.category'])
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(10);

    $merch_details = MerchDetails::with(['merchType', 'merchType.category'])
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);

    $printing_details = PrintingDetails::with(['printingType', 'printingType.category'])
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);
    
    return view('dashboard', compact('expense_details', 'merch_details', 'printing_details'));
})->name('dashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('reports', ReportController::class);
    Route::resource('expense_categories', ExpenseCategoryController::class);


    Route::get('expense_categories/{id}', [ExpenseCategoryController::class, 'show'])->name('expense_categories.show');
    Route::resource('expense_types', ExpenseTypeController::class);
    Route::resource('expense_details', ExpenseDetailsController::class);
    Route::get('expense_types/{id}', [ExpenseTypeController::class, 'show'])->name('expense_types.show');


    Route::resource('merch_categories', MerchCategoryController::class);
    Route::get('merch_categories/{id}', [MerchCategoryController::class, 'show'])->name('merch_categories.show');
    Route::resource('merch_types', MerchTypeController::class);
    Route::get('merch_types/{id}', [MerchTypeController::class, 'show'])->name('merch_types.show');
    Route::resource('merch_details', MerchDetailsController::class);


    Route::resource('printing_categories', PrintingCategoryController::class);
    Route::get('printing_categories/{id}', [PrintingCategoryController::class, 'show'])->name('printing_categories.show');
    Route::resource('printing_types', PrintingTypeController::class);
    Route::get('printing_types/{id}', [PrintingTypeController::class, 'show'])->name('printing_types.show');
    Route::resource('printing_details', PrintingDetailsController::class);

    Route::resource('items', ItemController::class);
});



require __DIR__.'/auth.php';
