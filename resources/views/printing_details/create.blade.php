<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Printing Detail') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class="mb-4">Add Printing Detail</h1>
        <form action="{{ route('printing_details.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="printing_type_id" class="form-label">Expense Type</label>
                <select name="printing_type_id" id="printing_type_id" class="form-control" required>
                    <option value="">Select an Expense Type</option>
                    @foreach($printing_types as $printing_type)
                        <option value="{{ $printing_type->id }}">{{ $printing_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('printing_details.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
