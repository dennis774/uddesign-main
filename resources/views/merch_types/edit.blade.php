<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Merch Type') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <h1>Edit Expense Type</h1>
        <form action="{{ route('merch_types.update', $merch_type->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="name" class="form-label">Merch Type Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $merch_type->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="merch_category_id" class="form-label">Category</label>
                <select name="merch_category_id" id="merch_category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    @foreach($merch_categories as $merch_category)
                        <option value="{{ $merch_category->id }}" {{ $merch_type->merch_category_id == $merch_category->id ? 'selected' : '' }}>
                            {{ $merch_category->name }}
                        </option>
                    @endforeach
                </select>
                @error('merch_category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('merch_types.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
