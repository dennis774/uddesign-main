<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Expense Type') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <h1>Edit Expense Type</h1>
        <form action="{{ route('expense_types.update', $expense_type->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="name" class="form-label">Expense Type Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $expense_type->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="expense_category_id" class="form-label">Category</label>
                <select name="expense_category_id" id="expense_category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    @foreach($expense_categories as $expense_category)
                        <option value="{{ $expense_category->id }}" {{ $expense_type->expense_category_id == $expense_category->id ? 'selected' : '' }}>
                            {{ $expense_category->name }}
                        </option>
                    @endforeach
                </select>
                @error('expense_category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('expense_types.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
