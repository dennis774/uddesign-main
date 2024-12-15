<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Expense Category') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Add Expense Category</h1>
        <form action="{{ route('expense_categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('expense_categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
