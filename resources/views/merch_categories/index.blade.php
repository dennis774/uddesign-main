<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merch Categories') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Categories</h1>
        <a href="{{ route('merch_categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($merch_categories as $merch_category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $merch_category->name }}</td>
                    <td>
                        <a href="{{ route('merch_categories.edit', $merch_category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('merch_categories.destroy', $merch_category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('merch_categories.show', $merch_category->id) }}" class="btn btn-info btn-sm">View Details</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

