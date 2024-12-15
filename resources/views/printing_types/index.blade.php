<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merch Types') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <h1>Expense Types</h1>
        <a href="{{ route('printing_types.create') }}" class="btn btn-primary mb-3">Add Merch Type</a>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Expense Type Name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($printing_types as $printing_type)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $printing_type->name }}</td>
                    <td>{{ $printing_type->category->name ?? 'No Category' }}</td>
                    <td>
                        <a href="{{ route('printing_types.edit', $printing_type->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('printing_types.destroy', $printing_type->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No expense types available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
