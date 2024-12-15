<?php

namespace App\Http\Controllers;

use App\Models\MerchCategory;
use App\Models\MerchType;
use Illuminate\Http\Request;

class MerchTypeController extends Controller
{
    public function index()
    {
        $merch_types = MerchType::with('category')->get();
        return view('merch_types.index', compact('merch_types'));
    }

    public function create()
    {
        $merch_categories = MerchCategory::all();
        return view('merch_types.create', compact('merch_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'merch_category_id' => 'required|exists:merch_categories,id',
        ]);

        MerchType::create($request->all());
        return redirect()->route('merch_types.index')->with('success', 'Item created successfully!');
    }

    public function show($id)
{
    $merch_type = MerchType::with('merchDetails')->findOrFail($id);

    return view('merch_types.show', compact('merch_type'));
}


    public function edit(MerchType $merch_type)
    {
        $merch_categories = MerchCategory::all();
        return view('merch_types.edit', compact('merch_type', 'merch_categories'));
    }

    public function update(Request $request, MerchType $merch_type)
    {
        $request->validate([
            'name' => 'required|max:255',
            'merch_category_id' => 'required|exists:merch_categories,id',
        ]);

        $merch_type->update($request->all());
        return redirect()->route('merch_types.index')->with('success', 'Item updated successfully!');
    }

    public function destroy(MerchType $merch_type)
    {
        $merch_type->delete();
        return redirect()->route('merch_types.index')->with('success', 'Item deleted successfully!');
    }
}

