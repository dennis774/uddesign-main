<?php

namespace App\Http\Controllers\Api;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use App\Models\ExpenseDetail;
use App\Models\ExpenseType;
use App\Models\MerchCategory;
use App\Models\MerchDetails;
use App\Models\MerchType;
use App\Models\PrintingCategory;
use App\Models\PrintingDetails;
use App\Models\PrintingType;

class DataController extends Controller
{
    public function retrieveData()
    {
        $get_report = Report::orderBy('created_at')->get();
        $data = [];
        foreach ($get_report as $report) {
            array_push($data, [
                'cash' => $report->cash,
                'gcash' => $report->gcash,
                'print_sales' => $report->print_sales,
                'merch_sales' => $report->merch_sales,
                'custom_sales' => $report->custom_sales,
                'total_sales' => $report->total_sales,
                'print_expenses' => $report->print_expenses,
                'merch_expenses' => $report->merch_expenses,
                'custom_expenses' => $report->custom_expenses,
                'total_expenses' => $report->total_expenses,
                'date' => Carbon::parse($report->created_at)->format('Y-m-d H:i:s'),
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    // Method to retrieve report data
    public function retrieveReports()
    {
        $get_report = Report::orderBy('created_at')->get();
        $data = [];
        foreach ($get_report as $report) {
            array_push($data, [
                'cash' => $report->cash,
                'gcash' => $report->gcash,
                'print_sales' => $report->print_sales,
                'merch_sales' => $report->merch_sales,
                'custom_sales' => $report->custom_sales,
                'total_sales' => $report->total_sales,
                'print_expenses' => $report->print_expenses,
                'merch_expenses' => $report->merch_expenses,
                'custom_expenses' => $report->custom_expenses,
                'total_expenses' => $report->total_expenses,
                'date' => Carbon::parse($report->created_at)->format('Y-m-d H:i:s'),
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    // Method to retrieve merch category data
    public function retrieveMerchCategories()
    {
        $get_category = MerchCategory::orderBy('created_at')->get();

        $data_category = [];

        foreach ($get_category as $category) {
            array_push($data_category, [
                'id' => $category->id,
                'name' => $category->name,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_category,
        ]);
    }

    // Method to retrieve merch type data
    public function retrieveMerchType()
    {
        $get_merch = MerchType::orderBy('created_at')->get();

        $data_merch = [];

        foreach ($get_merch as $merch) {
            array_push($data_merch, [
                'id' => $merch->id,
                'merch_category_id' => $merch->merch_category_id,
                'name' => $merch->name,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_merch,
        ]);
    }

    // Method to retrieve merch detail data
    public function retrieveMerchDetails()
    {
        $get_merch_details = MerchDetails::orderBy('created_at')->get();

        $data_merch_details = [];

        foreach ($get_merch_details as $merch_detail) {
            array_push($data_merch_details, [
                'merch_type_id' => $merch_detail->merch_type_id,
                'pcs' => $merch_detail->pcs,
                'date' => $merch_detail->created_at,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_merch_details,
        ]);
    }

    // Method to retrieve print category data
    public function retrievePrintCategories()
    {
        $get_category = PrintingCategory::orderBy('created_at')->get();

        $data_category = [];

        foreach ($get_category as $category) {
            array_push($data_category, [
                'id' => $category->id,
                'name' => $category->name,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_category,
        ]);
    }

    // Method to retrieve print type data
    public function retrievePrintType()
    {
        $get_print = PrintingType::orderBy('created_at')->get();

        $data_print = [];

        foreach ($get_print as $print) {
            array_push($data_print, [
                'id' => $print->id,
                'print_category_id' => $print->printing_category_id,
                'name' => $print->name,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_print,
        ]);
    }

    // Method to retrieve print detail data
    public function retrievePrintDetails()
    {
        $get_print_details = PrintingDetails::orderBy('created_at')->get();

        $data_print_details = [];

        foreach ($get_print_details as $print_detail) {
            array_push($data_print_details, [
                'print_type_id' => $print_detail->printing_type_id,
                'pcs' => $print_detail->quantity,
                'date' => $print_detail->created_at,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_print_details,
        ]);
    }

    // Method to retrieve print category data
    public function retrieveExpenseCategories()
    {
        $get_category = ExpenseCategory::orderBy('created_at')->get();

        $expense_category = [];

        foreach ($get_category as $category) {
            array_push($expense_category, [
                'id' => $category->id,
                'name' => $category->name,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $expense_category,
        ]);
    }

    // Method to retrieve print type data
    public function retrieveExpenseType()
    {
        $get_expense = ExpenseType::orderBy('created_at')->get();

        $data_expense = [];

        foreach ($get_expense as $expense) {
            array_push($data_expense, [
                'id' => $expense->id,
                'expense_category_id' => $expense->expense_category_id,
                'name' => $expense->name,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_expense,
        ]);
    }

    // Method to retrieve print detail data
    public function retrieveExpenseDetails()
    {
        $get_expense_details = ExpenseDetail::orderBy('created_at')->get();

        $data_expense_details = [];

        foreach ($get_expense_details as $expense_detail) {
            array_push($data_expense_details, [
                'expense_type_id' => $expense_detail->printing_type_id,
                'pcs' => $expense_detail->quantity,
                'date' => $expense_detail->created_at,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data_expense_details,
        ]);
    }

    
}
