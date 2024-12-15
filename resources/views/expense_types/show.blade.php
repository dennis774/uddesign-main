<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense Type Details') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>{{ $expense_type->name }}</h1>
        <p><strong>Category:</strong> {{ $expense_type->expenseCategory->name ?? 'N/A' }}</p>
        <p><strong>Description:</strong> {{ $expense_type->description ?? 'N/A' }}</p>

        <h2>Associated Expense Details:</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Expense Type</th>
                    <th>Price</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expense_type->expenseDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $expense_type->name }}</td>
                    <td>₱ {{ number_format($detail->price, 2) }}</td>
                    <td>{{ $detail->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
