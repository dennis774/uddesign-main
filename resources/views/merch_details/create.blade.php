<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Merch Detail') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class="mb-4">Add Merch Detail</h1>
        <form action="{{ route('merch_details.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="merch_type_id" class="form-label">Expense Type</label>
                <select name="merch_type_id" id="merch_type_id" class="form-control" required>
                    <option value="">Select an Expense Type</option>
                    @foreach($merch_types as $merch_type)
                        <option value="{{ $merch_type->id }}">{{ $merch_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pcs" class="form-label">Pieces</label>
                <input type="number" name="pcs" id="pcs" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('merch_details.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
