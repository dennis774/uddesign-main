<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense Details') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Expense Details</h1>
        <a href="{{ route('expense_details.create') }}" class="btn btn-primary mb-3">Add Expense Detail</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Expense Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expense_details as $detail)
                <tr class="clickable-row" data-href="{{ route('expense_types.show', $detail->expenseType->id) }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->expenseType->name }}</td>
                    <td>₱ {{ number_format($detail->price, 2) }}</td>
                    <td>
                        <a href="{{ route('expense_details.edit', $detail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('expense_details.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .clickable-row {
            cursor: pointer;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.addEventListener('click', function (e) {
                    if (!e.target.closest('.btn')) { // Prevent click on buttons triggering the row redirect
                        window.location = this.dataset.href;
                    }
                });
            });
        });
    </script>
</x-app-layout>
