<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense Types for ') . $expense_category->name }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Expense Types for "{{ $expense_category->name }}"</h1>
        <a href="{{ route('expense_categories.index') }}" class="btn btn-secondary mb-3">Back to Categories</a>
    
        @foreach($expense_category->types as $type)
        <h3>{{ $type->name }}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse($type->expenseDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->price }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">No details found for this type.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    @endforeach
    
    </div>
</x-app-layout>
