<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Merch Detail') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class="mb-4">Edit Merch Detail</h1>
        <form action="{{ route('merch_details.update', $merch_detail->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="merch_type_id" class="form-label">Expense Type</label>
                <select name="merch_type_id" id="merch_type_id" class="form-control" required>
                    @foreach($merch_types as $merch_type)
                        <option value="{{ $merch_type->id }}" {{ $merch_type->id == $merch_detail->merch_type_id ? 'selected' : '' }}>
                            {{ $merch_type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pcs" class="form-label">Pieces</label>
                <input type="number" name="pcs" id="pcs" class="form-control" value="{{ $merch_detail->pcs }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('merch_details.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
