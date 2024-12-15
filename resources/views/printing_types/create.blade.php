<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Printing Type') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <h1>Add Printing Type</h1>
        <form action="{{ route('printing_types.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Printing Type Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="printing_category_id" class="form-label">Printing Category</label>
                <select name="printing_category_id" id="printing_category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    @foreach($printing_categories as $printing_category)
                        <option value="{{ $printing_category->id }}" {{ old('printing_category_id') == $printing_category->id ? 'selected' : '' }}>
                            {{ $printing_category->name }}
                        </option>
                    @endforeach
                </select>
                @error('printing_category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('printing_types.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
