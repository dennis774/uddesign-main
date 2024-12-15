<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Expense Detail') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Add Expense Detail</h1>
        <form action="{{ route('expense_details.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="expense_type_id" class="form-label">Expense Type</label>
                <select name="expense_type_id" id="expense_type_id" class="form-control" required>
                    <option value="">Select an Expense Type</option>
                    @foreach($expense_types as $expense_type)
                        <option value="{{ $expense_type->id }}">{{ $expense_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('expense_details.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
