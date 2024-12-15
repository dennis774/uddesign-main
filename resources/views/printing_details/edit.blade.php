<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Print Detail') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class="mb-4">Edit Print Detail</h1>
        <form action="{{ route('pritning_details.update', $pritning_detail->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="printing_type_id" class="form-label">Expense Type</label>
                <select name="printing_type_id" id="printing_type_id" class="form-control" required>
                    @foreach($printing_types as $printing_type)
                        <option value="{{ $printing_type->id }}" {{ $printing_type->id == $pritning_detail->printing_type_id ? 'selected' : '' }}>
                            {{ $printing_type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $pritning_detail->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pritning_details.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
