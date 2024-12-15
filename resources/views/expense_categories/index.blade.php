<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense Categories') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Categories</h1>
        <a href="{{ route('expense_categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
    
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
                @foreach($expense_categories as $expense_category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $expense_category->name }}</td>
                    <td>
                        <a href="{{ route('expense_categories.edit', $expense_category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('expense_categories.destroy', $expense_category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('expense_categories.show', $expense_category->id) }}" class="btn btn-info btn-sm">View Details</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

